@extends('layouts.lo_kabeng')

@section('content')
<title>Tambah Barang</title> 
    <div class="container-fluid">
    <h3 class="mt-4">Tambah Barang</h3>
    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" action="{{ URL('/barang/store') }}" enctype="multipart/form-data">
                    @csrf
            <p class="h3">&nbsp;&nbsp;Barang</p>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang...">
                        </div>
                    <div class="form-group col-md-6">
                        <label for="nama_barang">Nama Barang</label>
                        <input class="form-control" type="text" id="nama_barang" name="nama_barang" placeholder="Nama Barang...">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="kategori_barang">Kategori_Barang</label>
                        <select class="form-control" id="kategori" name="kategori">
                        <option value='-'>Status</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="harga_beli">Harga Beli</label>
                        <input class="form-control" type="text" id="harga_beli" name="harga_beli" placeholder="Harga beli...">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="harga_jual">Harga Jual</label>
                        <input class="form-control" type="text" id="harga_jual" name="harga_jual" placeholder="Harga jual...">
                    </div>
                    </div>
                    <!-- Stok dan diskon ketika create 0 -->
                        <input type="hidden" id="diskon" name="diskon" value="0">
                        <input type="hidden" id="stok"   name="stok" value="0">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection



