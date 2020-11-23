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
                        <input type="email" class="form-control" id="estimasiSelesai"  Placeholder="Isi Estimasi..">
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
            <form method="POST" action="{{ URL('/workorder/keranjang/')}}" enctype="multipart/form-data">
                    @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="barang">Pilih Barang</label>
                    <center><select class="form-control" id="kode_barang" name="kode_barang">
                            <option value='-'><h5>Pilih Barang...</h5></option>
                            @foreach ($barang as $ke => $b)
                            <option value="{{ $ke }}">{{ $b }}</option>
                            @endforeach
                    </select></center>
                </div>
                <div class="form-group col-md-2">
                    <label for="kilometerAwal">Jumlah</label>
                    <input type="hidden" name="user" id="user" value="{{ Auth::user()->id }}">
                    <input type="text" class="form-control" id="jumlah" name="jumlah" Placeholder="Jumlah..">
                </div>
               
                <!-- <div class="form-group col-md-2">
                    <label for="kilometerAwal">Diskon</label>
                    <input type="text" class="form-control" id="diskon" >
                </div>
                -->
                <div class="form-group col-md-6">
                    <label for="kilometerAwal">Deskripsi</label>
                    <input type="textbox" class="form-control" id="deskripsi" name="deskripsi" Placeholder="deskripsi..">
                </div>
                <div class="col align-self-center">
                    <div class="col-5">
                    <button type="submit" class="btn btn-success">Masukan Keranjang</button>
                    </div>
                </div>
                </form>
            </div>
            <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Keranjang Barang
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No </th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Deskripsi</th>
                        <th colspan="2">action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
           
            </form>
        </div>
    </div>
@endsection