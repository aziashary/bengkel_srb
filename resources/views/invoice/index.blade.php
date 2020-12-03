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
        <h6 class="m-0 font-weight-bold text-primary">
            Table Invoice </h6>
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
                        <th>Action</th>
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
                                <td>{{ $invoice->no_workorder }}</td>
                                <td>{{ $invoice->model }}</td>
                                <td>{{ $invoice->delivery_date }}</td>
                                <td>{{ $invoice->estimasi_selesai }}</td>
                                <td>{{ $invoice->nama_customer }}</td>
                                <td align="center" width="140">
                                    <a href="{{ URL('invoice/detail/'. $invoice->id_invoice) }}" class="btn btn-primary">Detail</a>
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