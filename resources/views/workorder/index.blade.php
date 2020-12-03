@extends('layouts.main')

@section('content')
<div class="container-fluid">
	<title>Table Work Order</title>
    <h3 class="mt-4">Data Work Order</h3>
    <div class="mb-4">
        <div class="btn-group">
            <a href="{{ route('workorder.create') }}" class="center btn btn-gradient btn-primary" title="Tambah Data">Tambah Data</i></a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            Data Work Order </h6>
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
                        <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                        $no = 1;
                        ?>
                    <tbody>
                        @foreach($data as $workorder)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $workorder->no_workorder }}</td>
                                <td>{{ $workorder->model }}</td>
                                <td>{{ $workorder->delivery_date }}</td>
                                <td>{{ $workorder->estimasi_selesai }}</td>
                                <td>{{ $workorder->nama_customer }}</td>
                                <td align="center" width="140">
                                    <a href="{{ URL('workorder/detail/'. $workorder->id_workorder) }}" class="btn btn-primary">Detail</a>
                                    <a href="{{ URL('workorder/print/'. $workorder->id_workorder) }}" class="btn btn-success">Print</a>
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