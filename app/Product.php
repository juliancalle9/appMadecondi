<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'idproducto';
    protected $fillable = [
        'nombre','estado','preciounitario','idcategoria','idlote'
    ];
    public $timestamps = false;
    public static $rules =[
        'nombre' => 'required|min:3',
        'estado' => 'required',
        'idlote' => 'required',
        'precioUnitario' => 'required|numeric|min:0',
        'idcategoria' => 'required'
    ];
}
