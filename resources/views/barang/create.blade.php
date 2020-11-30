@extends('layouts.main')

@section('content')
<title>Tambah Barang</title> 
    <div class="container-fluid">
    <!-- <h3 class="mt-4">Tambah Barang</h3> -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" action="{{ URL('/barang/store') }}">
                    @csrf
                    <center>
                        <h5>Tambah Barang</h5>
                        <hr>
                    </center>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="masukan kode barang" required>
                        </div>
                    <div class="form-group col-md-6">
                        <label for="nama_barang">Nama Barang</label>
                        <input class="form-control" type="text" id="nama_barang" name="nama_barang" placeholder="masukan nama barang" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="kategori">Kategori Barang</label>
                        <select class="form-control" id="kategori" name="kategori" required>
                            <option>pilih kategori</option>
                            @foreach ($kategori as $key => $kategori)
                            <option value="{{ $key }}">{{ $kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="harga_beli">Harga Beli</label>
                        <input class="form-control" type="text" id="harga_beli" name="harga_beli" placeholder="masukan harga beli" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="harga_jual">Harga Jual</label>
                        <input class="form-control" type="text" id="harga_jual" name="harga_jual" placeholder="masukan harga jual" required>
                    </div>
                    </div>
                    <!-- Stok dan diskon ketika create 0 -->
                    <input type="hidden" id="diskon" name="diskon" value="0">
                    <input type="hidden" id="stok"   name="stok" value="0">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a type="button" class="btn btn-secondary" href="{{ route('barang.index') }}">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#kategori').select2();
        });
    </script>
@endsection



