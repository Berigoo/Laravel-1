@extends('template')

@section('title')
    Hasil Input
@endsection

@section('topic')
    Data yang telah diinput
@endsection

@section('style')
    <style>
        table{
            font-family: "JetBrains Mono", serif;
            width: 75%;
        }

        th, td{
            border-right: 1px solid;
            text-align: left;
            padding: 5px;
        }
    </style>
@endsection

@section('content')
    <table style="border: #4b5563 2px solid; border-collapse: separate">
        <tr>
            <th>No.</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jenis Barang</th>
            <th>Kuantitas</th>
            <th>Harga</th>
        </tr>
    @for($i=0;$i<$Items->getLen();$i++)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $Items->kode_barang[$i] }}</td>
            <td>{{ $Items->nama_barang[$i] }}</td>
            <td>{{ $Items->jenis_barang[$i] }}</td>
            <td>{{ $Items->qty[$i]. '  xRp'. $Items->harga[$i] }}</td>
            <td>{{ 'Rp. '. $Items->getTotalHargaByIndex($i) }}</td>
        </tr>
    @endfor
        <tr></tr>
        <tr></tr>
        <tr>
            <td colspan="5">Total Harga</td>
            <td><s>{{ 'Rp. '. $Items->getTotalHarga() }}</s></td>
        </tr>
        <tr>
            <td colspan="5">Potongan Harga</td>
            <td><b>{{ $Items->getDiscount() }}</b></td>
        </tr>
        <tr>
            <td colspan="5">Total Harga setelah Diskon</td>
            <td><b>{{ 'Rp. '. $Items->getFinalHarga() }}</b></td>
        </tr>
    </table>
@endsection
