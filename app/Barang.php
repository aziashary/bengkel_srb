<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori_barang',
        'harga_beli',
        'harga_jual',
        'diskon',
        'stok'
    ];
}

          