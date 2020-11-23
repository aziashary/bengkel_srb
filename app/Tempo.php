<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempo extends Model
{
    protected $table = 'tempo';
    protected $fillable = ['id_tempo','kode_barang','jumlah', 'diskon', 'harga', 'deskrispi',
    'total_harga','id_users'];
}

          