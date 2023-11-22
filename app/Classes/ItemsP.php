<?php
namespace App\Classes;

class ItemsP{
    public array $kode_barang;
    public array $nama_barang;
    public array $jenis_barang;
    public array $harga;

    public function __construct($kode_barang_arr, $nama_barang_arr, $jenis_barang_arr, $harga_arr){
        $this->kode_barang = $kode_barang_arr;
        $this->nama_barang = $nama_barang_arr;
        $this->jenis_barang = $jenis_barang_arr;
        $this->harga = $harga_arr;
    }
    public function getLen(): int
    {
        return count($this->kode_barang);
    }
    public function test(): void{
        echo "Henlo World";
    }
}
