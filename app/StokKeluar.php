<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokKeluar extends Model
{
    protected $table = 'stok_keluar';
    
    protected $fillable = ['kode_barang', 'nama_barang', 'jumlah', 'nama_user', 'no_workorder', 'no_invoice'];
}
