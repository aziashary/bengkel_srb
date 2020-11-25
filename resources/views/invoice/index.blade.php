@extends('layouts.lo_kabeng')

@section('content')
<div class="container-fluid">
	<title>Table Invoice</title>
    <h1 class="mt-4">Table Invoice</h1>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item">Table Invoice</li>
    </ol>
    <div class="mb-4">
        <div class="btn-group">
            <a href="?page=table&action=tambah" class="center btn btn-gradient btn-primary btn-lg" title="Tambah Data">Tambah Invoice</i></a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Data Invoice
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No </th>
                        <th>No Invoice</th>
                        <th>No Work Order</th>
                        <th>Model</th>
                        <th>Tanggal Masuk</th>
                        <th>Estimasi Selesai</th>
                        <th>Estimasi Harga</th>
                        <th>Pemilik</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        ?>
                        <tbody>
                            <!-- @foreach($data as $invoice)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <th>{{ $invoice->no_invoice }}</th>
                                <td>{{ $invoice->no_invoice }}</td>
                                <td>{{ $invoice->model }}</td>
                                <td>Rp. {{ $invoice->tanggal_masuk }}</td>
                                <td>Rp. {{ $invoice->estimasi_selesai }}</td>
                                <td>Rp. {{ $invoice->total_transaksi}}</td>
                                <td>{{ $invoice->nama_costumer }} %</td>
                                
                                <td>
                                <a href="{{ URL('invoice/edit/'. $invoice->id_invoice) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ URL('invoice/delete/'. $invoice->id_invoice) }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach -->
                  
                </table>
            </div>
        </div>
    </div>
</div>
@endsection