@extends('layouts.main')
@section('content')
<div class="container-fluid">
	<title>Table Stok Keluar</title>
    <h3 class="mt-4">Data Stok Keluar</h3>
    <div class="card mb-4">
        <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            Stok Keluar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No </th>
                        <th>Nama Barang</th>
                        <th>Tanggal Stok Keluar</th>
                        <th>Jumlah Stok Keluar</th>
                        <th>No Work Order</th>
                        <th>No Invoice</th>
                        <th>Nama</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    ?>
                    <tbody>
                        @foreach($data as $stokkeluar)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <th>{{ $stokkeluar->nama_barang }}</th>
                            <td>{{ $stokkeluar->created_at }}</td>
                            <td>{{ $stokkeluar->jumlah}}</td>
                            <td>{{ $stokkeluar->no_workorder }}</td>
                            <td>{{ $stokkeluar->no_invoice }}</td>
                            <td>{{ $stokkeluar->nama_user }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection