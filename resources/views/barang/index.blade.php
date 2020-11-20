@extends('layouts.lo_kabeng')
@section('content')
<div class="container-fluid">
	<title>Table Barang</title>
    <h3 class="mt-4">Data Barang</h3>
    <div class="mb-4">
        <div class="btn-group">
            <a href="{{ route('barang.create') }}" class="center btn btn-gradient btn-primary" title="Tambah Data">Tambah Data</i></a>
        </div>
        <div class="btn-group">
            <a href="?page=table&action=tambah" class="center btn btn-gradient btn-success" title="Tambah Data">Tambah Stok Barang</i></a>
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
                        <th>Kode Barang</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Profit</th>
                        <th>Diskon</th>
                        <th>Stok</th>
                        <th colspan="2">action</th>
                        </tr>
                    </thead>
                    <?php
                        $no = 1;
                        ?>
                        <tbody>
                            @foreach($data as $barang)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <th>{{ $barang->kode_barang }}</th>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->kategori_barang }}</td>
                                <td>Rp. {{ $barang->harga_beli }}</td>
                                <td>Rp. {{ $barang->harga_jual }}</td>
                                <td>Rp. {{ $barang->harga_jual - $barang->harga_beli }}</td>
                                <td>{{ $barang->diskon }} %</td>
                                <td>{{ $barang->stok}}</td>
                                <td>
                                <a href="{{ URL('barang/edit/'. $barang->kode_barang) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ URL('barang/delete/'. $barang->kode_barang) }}" class="btn btn-danger">Hapus</a>
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