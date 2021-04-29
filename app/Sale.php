<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $primaryKey = 'idVenta';
    protected $fillable = [
        'nombreCliente','telefono','direccion','precioUnitario','precioTotal'
    ];

    public static $rules =[
        'nombreCliente' => 'required',
        'telefono' => 'required|numeric',
        'direccion' => 'required',
        'precioUnitario' => 'required|numeric',
        'precioTotal' => 'required|numeric',
    ];
}
