@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h4>Detail Invoice</h4>
    <br>

    <div class="card mb-4">
        <div class="card-body">       
            <center>
                <h5>Transaksi Invoice</h5>
                <hr>
            </center>
            <form id="form-cart">
                @csrf 
                <div class="form-row">
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
        </form>
        
        <form method="POST" action="{{ URL('/invoice/store') }}" enctype="multipart/form-data">
        @foreach ($item as $invoice )
        @csrf 
        <center>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="kilometerAwal"><h4>Total Transaksi</h4></label>
                <input type="text" class="form-control" id="total" name='total' readonly>
                </div>
            </div>
            </center>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <center>
                <h5>Data Customer</h5>
                <hr>
            </center>
            <div class="row">
            @foreach ($no_wo as $workorder )
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="namaCustomer">Nama Customer</label>
          
                        <input type="text" class="form-control" value="{{ $workorder -> nama_customer }}" id="namaCustomer" name="nama_customer" Placeholder="Isi nama.." readonly>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenisMobil">Jenis Mobil</label>
                        <input type="text" class="form-control" value="{{ $invoice-> model }}" id="model" name="model" Placeholder="Jenis Mobil.." readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="npwp">Flat No</label>
                        <input type="text" class="form-control" id="flat_no" value="{{ $invoice-> no_flat }}" name="flat_no" Placeholder="Flat no.." readonly>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="namaCustomer">Alamat</label>
                        <textarea class="form-control" id="alamat"  name="alamat" Placeholder="Alamat..." readonly>{{ $workorder-> alamat }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="npwp">NPWP</label>
                        <input type="text" class="form-control" value="{{ $workorder-> npwp }}" id="npwp" name="npwp" Placeholder="Isi NPWP.." readonly>
                    </div>
                </div>
                @endforeach
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="npwp">Jarak Tempuh</label>
                        <input type="number" class="form-control" value="{{ $invoice-> milleage }}" id="milleage" name="milleage" Placeholder="Flat no.." readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kilometerAwal">Kilometer Awal</label>
                        <input type="text" class="form-control" value="{{ $invoice-> kilometer_awal }}" id="kilometerAwal" name="kilometer_awal" Placeholder="Kilometer awal.." readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estimasiSelesai">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="estimasiSelesai" value="{{ $invoice-> delivery_date }}" name="delivery_date"  Placeholder="Isi Estimasi.." readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estimasiSelesai">Estimasi Selesai</label>
                        <input type="date" class="form-control" id="estimasiSelesai" name="estimasi_selesai" value="{{ $invoice-> estimasi_selesai }}" Placeholder="Isi Estimasi.." readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estimasiSelesai">Sales</label>
                        <input type="text" class="form-control" id="sales" name="sales" value="{{ $invoice-> sales }}"  Placeholder="Sales.." readonly>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="estimasiSelesai">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="finish_date" name="finish_date" value="{{ $invoice-> finish_date }}" Placeholder="Selesai" readonly>
                    </div>
                </div>
                        <input type="hidden" name="no_workorder" value="{{ $invoice->no_workorder }}">
                        <input type="hidden" name="id_customer" value="{{ $invoice->id_customer }}">
                        <input type="hidden" name="id_user" value="{{ $invoice->id_user }}">
                        <input type="hidden" name="id_workorder" value="{{ $invoice->id_workorder}}">
            </div>
            <br>
            <!-- <button type="submit" class="btn btn-success">Submit</button> -->
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
            // console.log(data)
            $.ajax({
                type: 'GET',
                url: 'viewBarang/'+kode_barang,
                success: function(data) {
                    $("#stok").val(data[0].stok);
                    $("#diskon").val(data[0].diskon);
                }
            });
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