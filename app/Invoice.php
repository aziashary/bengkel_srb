<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';
    
    protected $fillable = [
        'id_workorder',
        'no_workorder',
        'id_invoice',
        'no_invoice',
        'id_customer',
        'no_flat',
        'model',
        'delivery_date',
        'milleage',
        'estimasi_selesai',
        'finish_date',
        'kilometer_awal',
        'total_transaksi',
        'id_user',
        'sales',
        'status'

    ];
}



          