@extends('layouts.lo_kabeng')
@section('content')
<title>Tambah Kategori</title> 
<div class="container-fluid">
    <h3 class="mt-4">Tambah Kategori</h3>
    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" action="{{ URL('/kategori/store') }}" enctype="multipart/form-data">
                    @csrf
            <p class="h3">&nbsp;&nbsp;Kategori</p>
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input class="form-control" type="text" id="nama_kategori" name="nama_kategori" >
                    </div>
        </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>
</div>
@endsection




