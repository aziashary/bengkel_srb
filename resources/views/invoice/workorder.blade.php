@extends('layouts.main')
@section('content')
<div class="container-fluid">
	<title>Table Work Order</title>
    <h1 class="mt-4">Table Work Order</h1>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item">Table Work Order</li>
    </ol>
    <div class="mb-4">
        <div class="btn-group">
            <a href="?page=table&action=tambah" class="center btn btn-gradient btn-primary btn-lg" title="Tambah Data">Tambah Work Order</i></a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Data Work Order
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No </th>
                        <th>No Work Order</th>
                        <th>Model</th>
                        <th>Tanggal Masuk</th>
                        <th>Estimasi</th>
                        <th>Pemilik</th>
                        </tr>
                    </thead>
                    <tbody>
                  
                </table>
            </div>
        </div>
    </div>
</div>
@endsection