<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchasedetail extends Model
{
    protected $table = "purchasesdetails";
    protected $primaryKey = 'iddetallecompra';
    protected $fillable = [
        'idcompra', 'idproducto','cantidad','precioFinal'
    ];
    public $timestamps = false;
}
