<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $table = 'workorder';
    
    protected $fillable = [
        'no_workorder',
        'id_costumer',
        'no_flat',
        'model',
        'delivery_date',
        'milleage',
        'estimasi_selesai',
        'total_transaksi',
        'nama_user',
        'sales'
    ];
}



          