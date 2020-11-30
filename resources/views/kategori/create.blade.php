@extends('layouts.main')
@section('content')
<title>Tambah Kategori</title> 
<div class="container-fluid">
    <!-- <h3 class="mt-4">Tambah Kategori</h3> -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" action="{{ URL('/kategori/store') }}" enctype="multipart/form-data">
            @csrf
            <center>
                <h5>Tambah Kategori</h5>
                <hr>
            </center>
            <div class="row">
                    <div class="form-group col-md-12">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input class="form-control" type="text" id="nama_kategori" name="nama_kategori" placeholder="masukan nama kategori" required>
                    </div>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            <a type="button" class="btn btn-secondary" href="{{ route('kategori.index') }}">Cancel</a>
            </form>
    </div>
</div>
@endsection




