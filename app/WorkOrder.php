<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $table = 'workorder';
    protected $fillable = ['kode_barang','nama_barang','jumlah','nama_user'];
}

          