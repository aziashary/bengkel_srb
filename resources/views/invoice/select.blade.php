@extends('layouts.main')

@section('content')
<div class="container-fluid">
	<title>Select Work Order</title>
    <h3 class="mt-4">Table Select</h3>
    <div class="mb-4">
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Table Select Work Order
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
                        <th>Aksi</th>
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
                                    <a href="{{ URL('invoice/create/'. $workorder->id_workorder) }}" class="btn btn-primary">Tambah Invoice</a>
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