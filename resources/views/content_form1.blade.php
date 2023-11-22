{{--@extends('template')--}}
@extends('mainreal')
@section('title')
    Input Data
@endsection

@section('topic')
    Input Data Barang Yang Dipilih
@endsection

@section('content')
    <div class="main-panel">
        <div class="card">
            <div class="card-body align-center">
                <h4 class="card-title"> Input Form </h4>
                <form class="forms-sample" id="form_main" action="/form/submit" method="POST">
                    @csrf
                    <div id="core">
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang: &ensp;</label>
                            <input class="form-control" list="list_kode_barang" id="kode_barang" name="kode_barang[]">
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">&emsp;Nama Barang: &ensp;</label>
                            <input class="form-control" list="list_nama_barang" id="nama_barang" name="nama_barang[]">
                        </div>
                        <div class="form-group">
                            <label for="jenis">&emsp;Jenis Barang: &ensp;</label>
                            <input class="form-control" list="list_jenis" id="jenis" name="jenis_barang[]">
                        </div>
                        <div class="form-group">
                            <label for="qty">&emsp;Kuantitas: &ensp;</label>
                            <input class="form-control" type="number" id="qty" min="1" value="0" name="qty[]">
                        </div>
                        <div class="form-group">
                            <label for="harga">&emsp;Harga Barang: &ensp;</label>
                            <input class="form-control" type="text" id="harga" value="0" name="harga[]"><br>
                        </div>
                    </div>

                    <div id="clone"></div>
                            <button class="btn btn-secondary me-2" id="add_item" type="button" value="Add Item">Add Item</button><br><br>
                            <button class="btn btn-primary me-1" type="submit" value="Proses">Submit</button>
                </form>
            </div>
        </div>
    </div>

    @php($datalistId = ["kode_barang", "nama_barang", "jenis_barang"])
    @foreach($datalistId as $id)
        <datalist id="{{ 'list_'.$id }}" name="{{ $id.'[]' }}">
            @for($i=0; $i<$ItemsP->getLen(); $i++)
                <option value="{{ $ItemsP->$id[$i] }}">
            @endfor
        </datalist>
    @endforeach
@endsection

@section('local_script')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
        $("#add_item").on("click", function (){
            $('#core').clone().appendTo('#clone')
        });
    </script>
@endsection
