<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class saleDetail extends Model
{
    protected $primaryKey = 'idDetalleVenta';
    protected $fillable = [
        'idVenta',
        'idProducto',
        'Cantidad',
        'valorTotal'
    ];
}
