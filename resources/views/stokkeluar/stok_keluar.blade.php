@extends('layouts.lo_kabeng')
@section('content')
<div class="container-fluid">
	<title>Table Stok Masuk</title>
    <h3 class="mt-4">Data Stok Masuk</h3>
    <div class="mb-4">
        <div class="btn-group">
            <a href="{{ route('stok.create') }}" class="center btn btn-gradient btn-primary" title="Tambah Data">Tambah Data</i></a>
        </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Stok Masuk
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No </th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Tanggal Keluar Stok</th>
                        <th>Jumlah Keluar Stok</th>
                        <th>Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                  
                </table>
            </div>
        </div>
    </div>
</div>
@endsection