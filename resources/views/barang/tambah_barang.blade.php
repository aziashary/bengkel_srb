@extends('layouts.lo_kabeng')
<div class="container-fluid">
<h1 class="mt-4">Tambah Barang</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="">Table Data Barang</a></li>
        <li class="breadcrumb-item active">Tambah Data Barang</li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">
            <p class="mb-0">
                <p class="h3">&nbsp;&nbsp;Barang</p>
                    <div class="form-group">
                    <label for="nama_cabang">Kode Barang</label>
                    <input type="text" class="form-control" id="nama_cabang" name="nama_cabang" placeholder="Nama Cabang">
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama_barang">Nama Barang</label>
                        <input class="form-control" type="text" id="nama_barang" name="nama_barang" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="kategori_barang">Kategori_Barang</label>
                    <select class="form-control" id="status" name="status">
                    <option value=''>Status</option>
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="harga_beli">Harga Beli</label>
                        <input class="form-control" type="text" id="harga_beli" name="harga_beli" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="harga_jual">Harga Jual</label>
                        <input class="form-control" type="text" id="harga_jual" name="harga_jual" >
                    </div>
                    </div>
            <input type="submit" name="" value="Simpan" class="btn btn-primary btn-icon-split">
            <a href="?page=table&action=tambah" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-sync-alt"></i>
            </span>
            <span class="text">Reload</span>
            </a>
            <a href="?page=table" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-ban"></i>
            </span>
            <span class="text">Cancel</span>
            </a>
       
        </div>
    </div>




