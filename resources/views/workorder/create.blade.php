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
            <form id="form-cart">
                @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="barang">Pilih Barang</label>
                    <center>
                        <select class="form-control" id="kode_barang" name="kode_barang">
                            <option value='-'><h5>Pilih Barang...</h5></option>
                            @foreach ($barang as $key => $b)
                                <option value="{{ $key }}">{{ $b }}</option>
                            @endforeach
                        </select>
                    </center>
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
                    <textarea class="form-control" id="deskripsi" name="deskripsi" Placeholder="deskripsi.."></textarea>
                </div>
                <div class="col align-self-center">
                    <div class="col-5">
                    <button type="button" class="btn btn-success" id="button-cart">Masukan Keranjang</button>
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
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody id="data-cart"></tbody>
                </table>
            </div>
        </div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
           
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        
        $("#button-cart").click(function(){
            var data = $("#form-cart").serialize();
            // console.log(data)
            $.ajax({
                type: 'POST',
                url: "{{ route('workorder.storeCart') }}",
                data: data,
                success: function(data) {
                    $("#form-cart").get(0).reset();
                    $("#kode_barang").select2("");
                    tampil()
                    console.log(data)
                    // .load("{{ url('workorder.table')}}");
                }
            });
        });

        function tampil(){
            $.ajax({
                type: 'GET',
                url: "{{ route('workorder.viewCart') }}",
                success: function(data) {
                    console.log(data)
                    var table_value = "";
                    var no = 1;
                    $.each(data, function(index, value) {
                        table_value += 
                        "<tr>"+
                            "<td>"+no+"</td>"+
                            "<td>"+value.barangs.nama_barang+"</td>"+
                            "<td>"+value.jumlah+"</td>"+
                            "<td>"+value.total_harga+"</td>"+
                            "<td>"+value.deskripsi+"</td>"+
                            "<td><a href='javascript:void(0)' onClick='hapus("+value.id_tempo+")'>Hapus</a></td>"+
                            
                        "</tr>"
                        no++
                    });

                    $("#data-cart").html(table_value)
                }
            });
        }

        function hapus(id){
            $.ajax({
                type: 'DELETE',
                url:'deleteCart/'+id,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function($id) {
                    console.log($id)
                    alert('success deleted data')
                    tampil()
                }
            });
        }

        function edit(id){
            alert(id)
            tampil()
        }

        $(document).ready(function(){
            tampil()
        })

    </script>
@endsection