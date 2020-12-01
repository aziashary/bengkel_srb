@extends('layouts.main')

@section('content')
<div class="container-fluid">
	<title>Table Invoice</title>
    <h3 class="mt-4">Table Invoice</h3>
    <div class="mb-4">
        <div class="btn-group">
            <a href="{{ route('invoice.select') }}" class="center btn btn-gradient btn-primary" title="Tambah Data">Tambah Data</i></a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Table Invoice
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
                        <th>Estimasi</th>
                        <th>Pemilik</th>
                        </tr>
                    </thead>
                    <?php
                        $no = 1;
                        ?>
                    <tbody>
                        @foreach($data as $invoice)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $invoice->no_invoice }}</td>
                                <td>{{ $invoice->model }}</td>
                                <td>{{ $invoice->delivery_date }}</td>
                                <td>{{ $invoice->estimasi_selesai }}</td>
                                <td>{{ $invoice->nama_customer }}</td>
                                <td align="center" width="140">
                                    <a href="{{ URL('invoice/edit/'. $invoice->id_invoice) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ URL('invoice/delete/'. $invoice->id_invoice) }}" class="btn btn-danger">Hapus</a>
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