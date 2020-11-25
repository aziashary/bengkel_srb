<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempo extends Model
{
    protected $table = 'tempo';

    protected $fillable = [
        'id_tempo',
        'kode_barang',
        'jumlah',
        'diskon',
        'harga',
        'deskripsi',
        'total_harga',
        'id_users'
    ];

    public function barangs()
    {
        return $this->hasOne('App\Barang', 'kode_barang', 'kode_barang');
    }
}

          