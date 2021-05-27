<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchasedetail extends Model
{
    protected $primaryKey = 'iddetallecompra';
    protected $fillable = [
        'idcompra', 'idproducto','cantidad','precioFinal'
    ];
    public $timestamps = false;
}
