@extends('layouts.lo_kabeng')
@section('content')
<div class="container-fluid">
	<title>Stok Masuk</title>
    <h1 class="mt-4">Stok Masuk</h1>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item">Table Data Stok Masuk</li>
    </ol>
    <div class="mb-4">
        <div class="btn-group">
            <a href="?page=table&action=tambah" class="center btn btn-gradient btn-primary btn-lg" title="Tambah Data">Tambah Wtok Masuk</i></a>
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
                        <th>Tanggal Masuk Stok</th>
                        <th>Jumlah Masuk Stok</th>
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