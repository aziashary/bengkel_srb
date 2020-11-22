@extends('layouts.lo_kabeng')
@section('content')
<title>Tambah Stok</title> 
<div class="container-fluid">
    <h3 class="mt-4">Tambah Stok</h3>
    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" action="{{ URL('/stokmasuk/store/')}}" enctype="multipart/form-data">
                    @csrf
            <center>
                <h5>Data Stok Masuk</h5>
                <hr>
            </center>
            
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                    <select class="selectpicker" id="kode_barang" name="kode_barang">
                        @foreach ($data as $barang)
                        <option value='{{ $barang -> kode_barang }}'>{{ $barang -> nama_barang }}</option>
                        @endforeach
                    </select>
            </div>
                    <div class="form-group">
                        <label for="jumlah_masuk">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
                    </div>
                    <input type=hidden id="nama_user" name="nama_user" value="{{ Auth::user()->name }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            @endforeach
        </div>
    </div>
@endsection



