<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubWorkOrder extends Model
{
    protected $table = 'subworkorder';
    protected $fillable = [
        'id_workorder',
        'kode_barang',
        'harga',
        'jumlah',
        'diskon',
        'total',
        'deskripsi',
        'tanggal_transaksi',
        'no_workorder'
    ];
}

          