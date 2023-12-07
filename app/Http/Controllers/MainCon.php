<?php

namespace App\Http\Controllers;

use App\Classes\ItemsP;
use App\Models\History;
use Illuminate\Http\Request;
use App\Models\Main;
use App\Classes\Items;
use Illuminate\Support\Facades\Log;

class MainCon extends Controller
{
    protected function dumpAll(){
        $data = Main::all()->toArray();
        $items = new ItemsP(array_column($data, 'kode_barang'), array_column($data, 'nama_barang'),
            array_column($data,'jenis'), array_column($data,'harga'));

        return view('content_form1')->with('ItemsP', $items);
    }

    protected function showInput(Request $req){
        return $req->post();
    }

    protected function doCalc(Request $req){
        $items = Items::createWithReq($req);
        $items->pushIntoDB();

        return view('content_viewBarang')->with('Items', $items);
    }

    protected function dumpHistory(){
        $data = History::all()->toArray();
        $items = Items::create($data);

        return view('content_viewall')->with('data', $items);
    }
    public function editView(Request $req, $id){
        $items = Items::createWithDBId($id);
        return view('content_form_edit')->with('Items', $items);
    }
    public function updateDB(Request $req){
        $items = Items::createWithReq($req);
        if($items->id){
            if($items->updateDB()){
                return $this->dumpHistory();
            }
        }else{
            echo "Task Failed Successfully";
        }
    }
}
