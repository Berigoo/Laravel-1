<?php

namespace App\Classes;
use App\Models\History;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Items extends ItemsP {
    public array $qty;
    public function __construct(Request $req){
        parent::__construct($req->input('kode_barang'),$req->input('nama_barang'),
            $req->input('jenis_barang'), $req->input('harga'));
        $this->qty = $req->input('qty');
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

}
