@extends('template')
@section('title')
    View Barang
@endsection

@section('topic')
    Data-data barang
@endsection

@section('content')
    <table>
        <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jenis Barang</th>
            <th>Kuantitas</th>
            <th>Total Harga</th>
            <th>opt</th>
        </tr>
        @for($i=0; $i<count($data->kode_barang); $i++)
            <tr>
                @for($j=0; $j<5; $j++)
                    <td>{{ $data->getValueByIndex($j, $i) }}</td>
                @endfor
                <td><a href="http://localhost:8000/edit/{{ $data->getValueByIndex(5, $i) }}">Edit</a></td>
            </tr>
        @endfor
    </table>
@endsection
