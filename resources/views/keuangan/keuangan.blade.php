@extends('layouts.lo_kabeng')
@section('content')
<div class="container-fluid">
	<title>Table Invoice</title>
    <h1 class="mt-4">Table Invoice</h1>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item">Table Invoice</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Data Keuangan
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                        <label for="tanggal_awal">Tanggal Awal</label>
                        <input class="form-control" type="date" id="tanggal_awal" name="tanggal_awal" value="">
                    </div>
                <div class="form-group col-md-6">
                        <label for="tanggal_akhir">Tanggal Akhir</label>
                        <input class="form-control" type="date" id="tanggal_akhir" name="tanggal_akhir" value="">
                    </div>
                </div>
            <div class="mb-2">
                <div class="btn-group">
                <input type="submit" name="simpan" value="Cari Tanggal" class="btn btn-primary btn-icon-split ">
                </div>
            </div>    
            <br>
            
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
                    <tbody>
                  
                </table>
            </div>
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