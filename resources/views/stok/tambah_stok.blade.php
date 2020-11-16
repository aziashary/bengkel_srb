@extends('layouts.lo_kabeng')
<div class="container-fluid">
<h1 class="mt-4">Tambah Barang</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="">Table Stok Masuk</a></li>
        <li class="breadcrumb-item active">Tambah Stok Masuk</li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">
            <p class="mb-0">
                <p class="h3">&nbsp;&nbsp;Stok Masuk</p>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                    <select class="form-control" id="nama_barang" name="nama_barang">
                    <option value=''>Status</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_masuk">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah_masuk" name="jumlah_masuk" placeholder="Jumlah">
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




