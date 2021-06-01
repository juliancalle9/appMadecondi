<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $primaryKey = 'idVenta';
    public $timestamps = false;
    protected $fillable = [
        'documento',
        'fechaVenta'
    ];

    
}
