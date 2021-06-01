<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class saleDetail extends Model
{
    protected $table = "salesDetail";
    protected $primaryKey = 'idDetalleVenta';
    public $timestamps = false;
    protected $fillable = [
        'idVenta',
        'idProducto',
        'Cantidad',
        'valorTotal'
    ];
}
