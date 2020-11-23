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
                        <th>harga</th>
                        <th>Total</th>
                        <th>Deskripsi</th>
                        <th colspan="2">action</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    ?>
                    <tbody>
                        @foreach($data as $table)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <th>{{ $table->kode_barang }}</th>
                            <td>{{ $table->jumlah }}</td>
                            <td>{{ $table->harga}}</td>
                            <td>{{ $table->total }}</td>
                            <td>{{ $table->deskripsi }}</td>
                            <td>
                            <a href="{{ URL('table/edit/'. $table->kode_barang) }}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            <br>
          
   