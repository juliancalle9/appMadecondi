<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $primaryKey = 'nit';
    protected $fillable = [
        'nit', 'nombre','direccion','telefono','idciudad'
    ];
    public $timestamps = false;

    public static $rules =[
        'nit' => 'required|exists:suppliers,nit',
        'nombre' => 'required',
        'direccion' => 'required',
        'telefono' => 'required|numeric',
        'idciudad' => 'required'
      ];
}
