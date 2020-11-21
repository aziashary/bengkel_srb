@extends('layouts.lo_kabeng')

@section('content')
    <div class="container-fluid">
    <h4>Tambah Work Order</h4>
    <br>
    <div class="card mb-4">
        <div class="card-body">
            <center>
                <h5>Data Customer</h5>
                <hr>
            </center>
            <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="namaCustomer">Nama Customer</label>
                        <input type="text" class="form-control" id="namaCustomer">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenisMobil">Jenis Mobil</label>
                        <input type="email" class="form-control" id="jenisMobil">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="npwp">NPWP</label>
                        <input type="text" class="form-control" id="npwp">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kilometerAwal">Kilometer Awal</label>
                        <input type="email" class="form-control" id="kilometerAwal">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="flatNo">Flat No</label>
                        <input type="text" class="form-control" id="flatNo">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estimasiSelesai">Estimasi Selesai</label>
                        <input type="email" class="form-control" id="estimasiSelesai">
                    </div>
                </div>
            </div>

            <br>
            
            <center>
                <h5>Transaksi Work Order</h5>
                <hr>
            </center>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="flatNo">Flat No</label>
                        <input type="text" class="form-control" id="flatNo">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estimasiSelesai">Estimasi Selesai</label>
                        <input type="email" class="form-control" id="estimasiSelesai">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
            </div>
            
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Cari Barang">
              <div class="input-group-append">
                <button class="btn btn-success" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
            
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection