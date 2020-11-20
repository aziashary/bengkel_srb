@extends('layouts.lo_kabeng')
@section('content')
<div class="container-fluid">
	<title>Table Kategori</title>
    <h3 class="mt-4">Data Kategori</h3>
    <div class="mb-4">
        <div class="btn-group">
            <a href="{{ route('kategori.create') }}" class="center btn btn-gradient btn-primary" title="Tambah Data">Tambah Data</i></a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Data Kategori
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No </th>
                        <th>Nama Kategori</th>
                        <th colspan="2">Action</th>

                        </tr>
                    </thead>
                    <?php
                        $no = 1;
                        ?>
                    <tbody>
                    <tr>
                    @foreach($data as $kategori)
                        <td>{{ $no++ }}</td>
                        <th>{{ $kategori->nama_kategori }}</th>
                        <td>
                            <a href="{{ URL('kategori/edit/'. $kategori->id_kategori) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ URL('kategori/delete/'. $kategori->id_kategori) }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection