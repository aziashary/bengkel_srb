@extends('layouts.main')
@section('content')
<div class="container-fluid">
	<title>Table Kategori</title>
    <!-- <h3 class="mt-4">Data Kategori</h3> -->
    <div class="mb-4">
        <div class="btn-group">
            <a href="{{ route('kategori.create') }}" class="center btn btn-gradient btn-primary" title="Tambah Data">Tambah Data</i></a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            Data Kategori </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead align="center">
                        <tr>
                        <th>No </th>
                        <th>Nama Kategori</th>
                        <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $kategori)
                            <tr>
                                <td align="center" width="50">{{ $key+1 }}</td>
                                <td>{{ $kategori->nama_kategori }}</td>
                                <td align="center" width="140">
                                    <a href="{{ URL('kategori/edit/'. $kategori->id_kategori) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ URL('kategori/delete/'. $kategori->id_kategori) }}" class="btn btn-danger">Hapus</a>
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