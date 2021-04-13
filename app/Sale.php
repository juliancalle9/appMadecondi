<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $primaryKey = 'idVenta';
    protected $fillable = [
        'nombreCliente','telefono','direccion','precioUnitario','precioTotal'
    ];
}
