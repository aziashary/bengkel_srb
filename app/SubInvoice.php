<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubInvoice extends Model
{
    protected $table = 'subinvoice';
    protected $fillable = [
        'id_invoice',
        'id_subworkorder',
        'id_workorder',
        'kode_barang',
        'harga',
        'jumlah',
        'diskon',
        'deskripsi',
        'total',
        'deskripsi',
        'tanggal_transaksi',
        'no_invoice'
    ];
}

          