<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    protected $table = 'costumer';
    protected $fillable = ['no_workorder','no_invoice','nama_costumer','alamat',
                            'npwp'];
}

          