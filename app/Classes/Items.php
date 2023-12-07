<?php

namespace App\Classes;
use App\Models\History;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use function Laravel\Prompts\select;

class Items extends ItemsP {
    public array $id;
    public array $qty;
    public function __construct(){}
    protected function fillWithReq(Request $req){
        parent::__construct($req->input('kode_barang'),$req->input('nama_barang'),
            $req->input('jenis_barang'), $req->input('harga'));
        $this->qty = $req->input('qty');
        if($req->input('id')) $this->id = (array)$req->input('id');
    }
    public static function create(array $data){
        $instance = new self();
        $instance->fill($data);
        return $instance;
    }
    public static function createWithReq(Request $req){
        $instance = new self();
        $instance->fillWithReq($req);
        return $instance;
    }
    public static function createWithDBId(int $id){
        $instance = new self();
        $instance->fillWithDBId($id);
        return $instance;
    }
    protected function fillWithDBId(int $id){
        $data = History::query()->where('id', $id)->first()->toArray();
        if($data){
            $this->kode_barang = (array)$data['kode_barang'];
            $this->nama_barang = (array)$data['nama_barang'];
            $this->jenis_barang = (array)$data['jenis'];
            $this->harga = (array)$data['total_harga'];
            $this->qty = (array)$data['qty'];
            $this->id = (array)$data['id'];
        }
    }
    protected function fill(array $data){
        $this->kode_barang = array_column($data, 'kode_barang');
        $this->nama_barang = array_column($data, 'nama_barang');
        $this->jenis_barang = array_column($data, 'jenis');
        $this->harga = array_column($data, 'total_harga');
        $this->qty = array_column($data, 'qty');
        $this->id = array_column($data, 'id');
    }
    public function getTotalHarga(): float
    {
        $res = 0;
        for($i=0; $i<count($this->harga); $i++){
            $res += $this->harga[$i] * $this->qty[$i];
        }
        return $res;
    }
    public function getTotalHargaByIndex($i): float
    {
        return $this->harga[$i] * $this->qty[$i];
    }
    public function getDiscount(): string{
        $total = $this->getTotalHarga();
        if ($total >= 500000) return '50%';
        elseif ($total >= 200000) return '20%';
        elseif($total >= 100000) return '10%';
        else return '0%';
    }
    public function getFinalHarga(): float{
        $total = $this->getTotalHarga();
        if ($total >= 500000) return $total - ($total * 50 / 100);
        elseif ($total >= 200000) return $total - ($total * 20 / 100);
        elseif($total >= 100000) return $total - ($total * 10 / 100);
        else return $this->getTotalHarga();
    }
    public function pushIntoDB(){
        $lastQueue = DB::table('history')->select('queue')->orderByDesc('queue')->first();
        $currQueue = $lastQueue->queue+1;
        for ($i=0; $i<$this->getLen(); $i++) {
            $history = new History();
            $history->queue = $currQueue;
            $history->kode_barang = $this->kode_barang[$i];
            $history->nama_barang = $this->nama_barang[$i];
            $history->jenis = $this->jenis_barang[$i];
            $history->qty = $this->qty[$i];
            $history->total_harga = $this->getTotalHargaByIndex($i);
            $history->save();
        }
    }
    public function updateDB(){
        $data = History::query()->find($this->id[0])->first();
        if($data){
            if($data->where('id', $this->id[0])->update(['nama_barang' =>$this->nama_barang[0],
                'kode_barang'=>$this->kode_barang[0], 'jenis'=>$this->jenis_barang[0], 'qty'=>$this->qty[0],
                'total_harga'=>$this->getTotalHargaByIndex(0)])) return true;
        }
        return false;
    }
    public function getValueByIndex(int $i, int $j){
        switch ($i){
            case 0:
                return $this->kode_barang[$j];
                break;
            case 1:
                return $this->nama_barang[$j];
                break;
            case 2:
                return $this->jenis_barang[$j];
                break;
            case 4:
                return $this->harga[$j];
                break;
            case 3:
                return $this->qty[$j];
                break;
            case 5:
                return $this->id[$j];
            default:
                return null;
                break;
        }
    }
}
