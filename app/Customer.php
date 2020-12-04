<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    
    protected $fillable = [
        'id_workorder',
        'no_workorder',
        'no_invoice',
        'nama_customer',
        'alamat',
        'npwp'
    ];
}

          