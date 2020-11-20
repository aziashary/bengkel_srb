<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokMasuk extends Model
{
    protected $table = 'stok_masuk';
    protected $fillable = ['kode_barang','nama_barang','jumlah','nama_user'];
}

          