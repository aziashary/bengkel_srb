@extends('layouts.main')
@section('content')
<div class="container-fluid">
	<title>Table Stok Masuk</title>
    <h3 class="mt-4">Data Stok Masuk</h3>
    <div class="mb-4">
        <div class="btn-group">
            <a href="{{ route('stokmasuk.create') }}" class="center btn btn-gradient btn-primary" title="Tambah Data">Tambah Data</i></a>
        </div>
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
                        <th>Tanggal Masuk Stok</th>
                        <th>Jumlah Masuk Stok</th>
                        <th>Nama</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    ?>
                    <tbody>
                        @foreach($data as $stokmasuk)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <th>{{ $stokmasuk->nama_barang }}</th>
                            <td>{{ $stokmasuk->created_at }}</td>
                            <td>{{ $stokmasuk->jumlah}}</td>
                            <td>{{ $stokmasuk->nama_user }}</td>
                            <td>
                            <a href="{{ URL('stokmasuk/edit/'. $stokmasuk->kode_barang) }}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection