@extends('layouts.main')
@section('content')
<title>Tambah Kategori</title> 
<div class="container-fluid">
    <!-- <h3 class="mt-4">Tambah Kategori</h3> -->
    <div class="card mb-4">
        <div class="card-body">
        @foreach ($data as $kategori)
            <form method="POST" action="{{ URL('/kategori/update/'. $kategori->id_kategori) }}" enctype="multipart/form-data">
            @csrf {{ method_field('PATCH') }}
            <center>
                <h5>Edit Kategori</h5>
                <hr>
            </center>
            <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <input class="form-control" type="text" id="nama_kategori" name="nama_kategori" value="{{ $kategori-> nama_kategori }}" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a type="button" class="btn btn-secondary" href="{{ route('kategori.index') }}">Cancel</a>
        </div>
        @endforeach
            </form>
       
    </div>
</div>
@endsection




