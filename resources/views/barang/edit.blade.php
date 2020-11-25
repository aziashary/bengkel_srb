@extends('layouts.main')
@section('content')
<title>Edit Barang</title> 
    <div class="container-fluid">
    <h3 class="mt-4">Edit Barang</h3>
    <div class="card mb-4">
        <div class="card-body">
        @foreach ($data as $barang)
            <form method="POST" action="{{ URL('/barang/update/'. $barang->kode_barang) }}" enctype="multipart/form-data">
                @csrf {{ method_field('PATCH') }}
            <p class="h3">&nbsp;&nbsp;Barang</p>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ $barang -> kode_barang }}">
                        </div>
                    <div class="form-group col-md-6">
                        <label for="nama_barang">Nama Barang</label>
                        <input class="form-control" type="text" id="nama_barang" name="nama_barang" value="{{ $barang -> nama_barang }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="kategori_barang">Kategori Barang</label>
                        <select class="form-control" id="kategori" name="kategori">
                        <option value='-'>Status</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="harga_beli">Harga Beli</label>
                        <input class="form-control" type="text" id="harga_beli" name="harga_beli" value="{{ $barang -> harga_beli }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="harga_jual">Harga Jual</label>
                        <input class="form-control" type="text" id="harga_jual" name="harga_jual" value="{{ $barang -> harga_jual }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="harga_jual">Diskon</label>
                        <input class="form-control" type="text" id="diskon" name="diskon" value="{{ $barang -> diskon }}">
                    </div>
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            @endforeach
        </div>
    </div>
@endsection



