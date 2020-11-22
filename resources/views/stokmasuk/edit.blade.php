@extends('layouts.lo_kabeng')
@section('content')
<title>Edit Stok</title> 
<div class="container-fluid">
    <h3 class="mt-4">Edit Stok</h3>
    <div class="card mb-4">
        <div class="card-body">
        @foreach ($data as $barang)
            <form method="POST" action="{{ URL('/stokmasuk/edit/'. $barang->id_stokmasuk) }}" enctype="multipart/form-data">
                @csrf {{ method_field('PATCH') }}
               <center>
                <h5>Edit Stok Masuk</h5>
                <hr>
            </center>
            
          
                    <div class="form-group">
                        <label for="jumlah_masuk">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" value="">
                    </div>
                    <input type=hidden id="nama_user" name="nama_user" value="{{ Auth::user()->name }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            @endforeach
    </div>
</div>

@endsection




