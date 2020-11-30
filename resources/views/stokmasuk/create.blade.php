@extends('layouts.main')
@section('content')
<title>Tambah Stok</title> 
<div class="container-fluid">
    <!-- <h3 class="mt-4">Tambah Stok</h3> -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" action="{{ URL('/stokmasuk/store/')}}" enctype="multipart/form-data">
                @csrf
                <center>
                    <h5>Tambah Stok Masuk</h5>
                    <hr>
                </center>
                <div class="row">
                    <div class="form-group col-md-12">
                    <label for="kode_barang">Nama Barang</label>
                        <select class="form-control" id="kode_barang" name="kode_barang">
                            <option>pilih barang</option>
                            @foreach ($data as $barang)
                            <option value='{{ $barang -> kode_barang }}'>{{ $barang -> nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="jumlah_masuk">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
                    </div>
                    <input type=hidden id="nama_user" name="nama_user" value="{{ Auth::user()->name }}">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <a type="button" class="btn btn-secondary" href="{{ route('stokmasuk.index') }}">Cancel</a>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#kode_barang').select2();
        });
    </script>
@endsection

