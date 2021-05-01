<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'idproducto';
    protected $fillable = [
        'nombre','preciounitario','idcategoria','idlote'
    ];

    public $timestamps = false;

    public static $rules =[
        
        'idcategoria' => 'required',
        'idlote' => 'required',
        'nombre' => 'required|min:3',
        'precioUnitario' => 'required|numeric|min:0',
        
    ];
}
