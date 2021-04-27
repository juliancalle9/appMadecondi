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
        'nombreCliente' => 'required|min:3',
        'telefono' => 'required|numeric',
        'direccion' => 'required',
        'precioUnitario' => 'required|numeric|min:0',
        'precioTotal' => 'required|numeric|min:0',
    ];
}
