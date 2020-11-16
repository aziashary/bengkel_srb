@extends('layouts.lo_kabeng')
@section('content')
<div class="container-fluid">
	<title>Table Barang</title>
    <h1 class="mt-4">Table Barang</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="mb-4">
        <div class="btn-group">
            <a href="?page=table&action=tambah" class="center btn btn-gradient btn-primary btn-lg" title="Tambah Data">Tambah Data</i></a>
        </div>
        <div class="btn-group">
            <a href="?page=table&action=tambah" class="center btn btn-gradient btn-success btn-lg" title="Tambah Data">Tambah Stok Barang</i></a>
        </div>
    </div>
 
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Data Barang
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No </th>
                        <th>Nama </th>
                        <th>Kategori </th>
                        <th>Harga Beli </th>
                        <th>Harga Jual</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                  
                </table>
            </div>
        </div>
    </div>
</div>
@endsection