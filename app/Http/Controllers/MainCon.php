<?php

namespace App\Http\Controllers;

use App\Classes\ItemsP;
use Illuminate\Http\Request;
use App\Models\Main;
use App\Classes\Items;

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
        $items = new Items($req);
        $items->pushIntoDB();

        return view('content_viewBarang')->with('Items', $items);
    }
}
