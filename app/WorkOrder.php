<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $table = 'workorder';
    
    protected $fillable = [
        'no_workorder',
        'id_customer',
        'no_flat',
        'model',
        'delivery_date',
        'milleage',
        'estimasi_selesai',
        'kilometer_awal',
        'total_transaksi',
        'id_user',
        'sales',
        'status'

    ];

    public function customers()
    {
        return $this->hasOne('App\Customer', 'id_customer', 'id_customer');
    }
}



          