@extends('layouts.lo_kabeng')
@section('content')
<title>Tambah Work Order</title> 
<div class="container-fluid">
    <h3 class="mt-4">Tambah Work Order</h3>
    <div class="card mb-4">
        <div class="card-body">
            <center>
                <h5>Data Customer</h5>
                <hr>
            </center>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="namaCustomer">Nama Customer</label>
                        <input type="text" class="form-control" id="namaCustomer" Placeholder="Isi nama..">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenisMobil">Jenis Mobil</label>
                        <input type="email" class="form-control" id="jenisMobil" Placeholder="Jenis Mobil..">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="npwp">NPWP</label>
                        <input type="text" class="form-control" id="npwp" Placeholder="Isi NPWP..">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="npwp">Flat No</label>
                        <input type="text" class="form-control" id="flat_no" Placeholder="Flat no..">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kilometerAwal">Kilometer Awal</label>
                        <input type="email" class="form-control" id="kilometerAwal" Placeholder="Kilometer awal..">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estimasiSelesai">Estimasi Selesai</label>
                        <input type="email" class="form-control" id="estimasiSelesai" Placeholder="Isi Estimasi..">
                    </div>
                </div>
            </div>
        </div>
    </div>
            <br>
    <div class="card mb-4">
        <div class="card-body">       
            <center>
                <h5>Transaksi Work Order</h5>
                <hr>
            </center>
          
            <div class="form-row">
                <div class="form-group col-md-12">
                    <center><label for="barang"><h4>Pilih Barang</h4></label></center>
                    <center><select class="form-control" id="barang" name="nama_barang">
                            <option value='-'><h5>Pilih Barang...</h5></option>
                            @foreach ($barang as $key => $b)
                            <option value="{{ $key }}">{{ $b }}</option>
                            @endforeach
                    </select></center>
                </div>
                <div class="form-group col-md-3">
                    <label for="kilometerAwal">Jumlah</label>
                    <input type="text" class="form-control" id="jumlah_barang" Placeholder="Jumlah..">
                </div>
                @foreach ($diskon as $i)
                <div class="form-group col-md-3">
                    <label for="kilometerAwal">Diskon</label>
                    <input type="text" class="form-control" id="diskon" value="{{ $i->diskon }}" Placeholder="diskon..">
                </div>
                @endforeach
                <div class="form-group col-xl-6">
                    <label for="kilometerAwal">Deskripsi</label>
                    <input type="textbox" class="form-control" id="deskripsi" Placeholder="deskripsi..">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
           
            </form>
        </div>
    </div>
@endsection