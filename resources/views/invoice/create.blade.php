@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <!-- <h4>Tambah Invoice</h4>
    <br> -->
    <div class="card mb-4">
        <div class="card-body">       
            <center>
                <h5>Tambah Invoice</h5>
                <hr>
            </center>
            <form id="form-cart">
            @csrf 
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="kode_barang">Pilih Barang</label>
                        <select class="form-control" id="kode_barang" name="kode_barang">
                            <option value='-'><h5>Pilih Barang</h5></option>
                            @foreach ($barang as $key => $i)
                                <option value="{{ $i->kode_barang }}">{{ $i->nama_barang }}</option>
                            @endforeach
                        </select>
                </div>
                
                <div class="form-group col-md-2">
                    <label for="stok">Stok</label>
                    <input type="text" class="form-control" id="stok" name="stok" readonly>
                </div>

                <div class="form-group col-md-2">
                    <label for="diskon">Diskon</label>
                    <input type="text" class="form-control" id="diskon" name="diskon" readonly>
                </div>

                <div class="form-group col-md-2">
                    <label for="jumlah">Jumlah</label>
                    <!-- <input type="hidden" name="user" id="user" value="{{ Auth::user()->id }}"> -->
                    <input type="text" class="form-control" id="jumlah" name="jumlah">
                </div>
               
                <div class="form-group col-md-12">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" Placeholder="Masukan deskripsi"></textarea>
                </div>
                
                <div class="col align-self-center">
                    <button type="button" class="btn btn-success btn-small" id="button-cart" style="width: 100%;">Masukan Keranjang</button>
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
        </form>
        
        <form method="POST" action="{{ URL('/invoice/store') }}" enctype="multipart/form-data">
        @foreach ($item as $invoice )
        @csrf 
        <div class="row">
            <div class="form-group col-md-12">
                <label for="kilometerAwal"><h4>Total Transaksi</h4></label>
                <input type="text" class="form-control" id="total" name='total' readonly>
            </div>
        </div>
    </div>
</div>

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
                        <input type="text" class="form-control" value="{{ $invoice->customers->nama_customer }}" id="namaCustomer" name="nama_customer">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenisMobil">Jenis Mobil</label>
                        <input type="text" class="form-control" value="{{ $invoice->model }}" id="model" name="model">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="namaCustomer">Alamat</label>
                        <textarea class="form-control" id="alamat"  name="alamat">{{ $invoice->customers->alamat }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="npwp">NPWP</label>
                        <input type="text" class="form-control" value="{{ $invoice->customers->npwp }}" id="npwp" name="npwp">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="npwp">Flat No</label>
                        <input type="text" class="form-control" id="flat_no" value="{{ $invoice->no_flat }}" name="flat_no">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="npwp">Jarak Tempuh</label>
                        <input type="number" class="form-control" value="{{ $invoice->milleage }}" id="milleage" name="milleage">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kilometerAwal">Kilometer Awal</label>
                        <input type="text" class="form-control" value="{{ $invoice-> kilometer_awal }}" id="kilometerAwal" name="kilometer_awal">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estimasiSelesai">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="estimasiSelesai" value="{{ $invoice-> delivery_date }}" name="delivery_date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estimasiSelesai">Sales</label>
                        <input type="text" class="form-control" id="sales" name="sales" value="{{ $invoice-> sales }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="estimasiSelesai">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="finish_date" name="finish_date" Placeholder="Selesai" >
                    </div>
                </div>
                        <input type="hidden" name="no_workorder" value="{{ $invoice->no_workorder }}">
                        <input type="hidden" name="estimasi_selesai" value="{{ $invoice-> estimasi_selesai }}">
                        <input type="hidden" name="id_customer" value="{{ $invoice->id_customer }}">
                        <input type="hidden" name="id_user" value="{{ $invoice->id_user }}">
                        <input type="hidden" name="id_workorder" value="{{ $invoice->id_workorder}}">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
            @endforeach
        </div> 
        </form>
    </div>
</div>
@endsection

@section('js')
    <script>
        
        $('#kode_barang').change(function () {
            var kode_barang = $(this).val();
            
            $.ajax({
                type: 'GET',
                url: '/invoice/viewBarang/'+kode_barang,
                success: function(data) {
                    $("#stok").val(data[0].stok);
                    $("#diskon").val(data[0].diskon);
                }
            });
        });
        
        $("#button-cart").click(function(){
            var data = $("#form-cart").serialize();
            var stok = $("#stok").val();
            var jumlah = $("#jumlah").val();
            console.log(1, Number(stok));
            console.log(2, Number(jumlah));

            if (Number(stok) == 0){
                alert("Stok 0, silakan tambahkan stok terlebih dahulu");
            }else if (Number(jumlah) > Number(stok)){
                alert("Jumlah tidak boleh lebih besar dari stok");
            }else{
                $.ajax({
                    type: 'POST',
                    url: "{{ route('invoice.storeCart') }}",
                    data: data,
                    success: function(data) {
                        // console.log(123, data)
                        $("#form-cart").get(0).reset();
                        $("#kode_barang").select2("");
                        tampil();
                    }
                });
            }
        });

        function tampil(){
            $.ajax({
                type: 'GET',
                url: "{{ route('invoice.viewCart') }}",
                success: function(data) {
                    // console.log(data)
                    var table_value = "";
                    var no = 1;
                    $.each(data, function(index, value) {
                        var deskripsi = value.deskripsi ? value.deskripsi : "-";
                        table_value += 
                        "<tr>"+
                            "<td align='center'>"+no+"</td>"+
                            "<td>"+value.barangs.nama_barang+"</td>"+
                            "<td>"+value.jumlah+"</td>"+
                            "<td>"+value.diskon+"</td>"+
                            "<td>"+value.total_harga+"</td>"+
                            "<td>"+deskripsi+"</td>"+
                            "<td align='center'><a href='javascript:void(0)' onClick='hapus("+value.id_tempo+")'>Hapus</a></td>"+
                        "</tr>"
                        no++
                    });

                    $("#data-cart").html(table_value)
                    var arrayTotal = data.map(item => item.total_harga)
                    var total = arrayTotal.reduce((a, b) => a + b, 0)
                    
                    $("#total").val(total);
                }
            });
        }

        function hapus(id){
            $.ajax({
                type: 'DELETE',
                url:'/invoice/deleteCart/'+id,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function($id) {
                    console.log($id)
                    $("#form-cart").get(0).reset();
                    $("#kode_barang").select2("");
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