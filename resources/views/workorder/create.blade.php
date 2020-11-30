@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h4>Tambah Work Order</h4>
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
                <div class="form-group col-md-4">
                    <label for="kode_barang">Pilih Barang</label>
                        <select class="form-control" id="kode_barang" name="kode_barang">
                            <option value='-'><h5>Pilih Barang</h5></option>
                            @foreach ($barang as $key => $item)
                                <option value="{{ $item->kode_barang }}">{{ $item->nama_barang }} - stok ({{ $item->stok }})</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="kilometerAwal">Jumlah</label>
                    <!-- <input type="hidden" name="user" id="user" value="{{ Auth::user()->id }}"> -->
                    <input type="text" class="form-control" id="jumlah" name="jumlah" Placeholder="Masukan jumlah barang">
                </div>
               
                <div class="form-group col-md-2">
                    <label for="kilometerAwal">Diskon</label>
                    <input type="hidden" class="form-control" id="stok">
                    <input type="text" class="form-control" id="diskon">
                </div>
               
                <div class="form-group col-md-12">
                    <label for="kilometerAwal">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" Placeholder="Masukan deskripsi"></textarea>
                </div>
                
                <div class="col align-self-center">
                    <button type="button" class="btn btn-success" id="button-cart">Masukan Keranjang</button>
                </div>
                </form>
            </div>
            <br>
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
                            <th>Diskon</th>
                            <th>Total</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="data-cart"></tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="kilometerAwal">Total Transaksi</label>
                <input type="text" class="form-control" id="total" >
            </div>
            <div class="form-group col-md-6">
                <label for="kilometerAwal">Estimasi Harga</label>
                <input type="text" class="form-control" id="estimasi_harga" >
            </div>
        </div>
           
        </form>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <center>
                <h5>Data Customer</h5>
                <hr>
            </center>
            <form method="POST" action="{{ URL('/workorder/store') }}" enctype="multipart/form-data">
            @csrf           
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="namaCustomer">Nama Customer</label>
                        <input type="text" class="form-control" id="namaCustomer" name="nama_customer" Placeholder="Isi nama..">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenisMobil">Jenis Mobil</label>
                        <input type="text" class="form-control" id="model" name="model" Placeholder="Jenis Mobil..">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="namaCustomer">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" Placeholder="Alamat..."></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="npwp">NPWP</label>
                        <input type="text" class="form-control" id="npwp" name="npwp" Placeholder="Isi NPWP..">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="npwp">Flat No</label>
                        <input type="text" class="form-control" id="flat_no" name="flat_no" Placeholder="Flat no..">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="npwp">Jarak Tempuh</label>
                        <input type="number" class="form-control" id="milleage" name="milleage" Placeholder="Flat no..">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kilometerAwal">Kilometer Awal</label>
                        <input type="text" class="form-control" id="kilometerAwal" name="kilometer_awal" Placeholder="Kilometer awal..">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estimasiSelesai">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="estimasiSelesai" name="delivery_date"  Placeholder="Isi Estimasi..">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estimasiSelesai">Estimasi Selesai</label>
                        <input type="date" class="form-control" id="estimasiSelesai" name="estimasi_selesai"  Placeholder="Isi Estimasi..">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estimasiSelesai">Sales</label>
                        <input type="text" class="form-control" id="sales" name="sales"  Placeholder="Sales.." >
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
        </div> 
        </form>
    </div>
        </div>

    
@endsection

@section('js')
    <script>
        
        $('#kode_barang').change(function () {
            var data = $(this).val();
            console.log(data)
        })
        $("#button-cart").click(function(){
            var data = $("#form-cart").serialize();
            console.log(1, data)

            $.ajax({
                type: 'POST',
                url: "{{ route('workorder.storeCart') }}",
                data: data,
                success: function(data) {
                    $("#form-cart").get(0).reset();
                    $("#kode_barang").select2("");
                    tampil()
                    
                    console.log(2, data)
                    // .load("{{ url('workorder.table')}}");
                }
            });
        });

        function tampil(){
            $.ajax({
                type: 'GET',
                url: "{{ route('workorder.viewCart') }}",
                success: function(data) {
                    // console.log(data)
                    var table_value = "";
                    var no = 1;
                    $.each(data, function(index, value) {
                        table_value += 
                        "<tr>"+
                            "<td>"+no+"</td>"+
                            "<td>"+value.barangs.nama_barang+"</td>"+
                            "<td>"+value.jumlah+"</td>"+
                            "<td>"+value.diskon+"</td>"+
                            "<td>"+value.total_harga+"</td>"+
                            "<td>"+value.deskripsi+"</td>"+
                            "<td><a href='javascript:void(0)' onClick='hapus("+value.id_tempo+")'>Hapus</a></td>"+
                        "</tr>"
                        no++
                    });

                    $("#data-cart").html(table_value)

                    var reducer = (accumulator, currentValue) => accumulator + currentValue;
                    var arrayTotal = data.map(item => item.total_harga)

                    var total = arrayTotal.reduce(reducer)
                    // console.log(66, total)
                    $("#total").val(total);
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

    <script>
        $(document).ready(function(){
            $('#kode_barang').select2();
        });
    </script>
@endsection