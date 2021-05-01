<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'idproducto';
    protected $fillable = [
        'idcategoria','idlote','nombre','preciounitario','estado'
    ];
    public $timestamps = false;
    public static $rules =[
        'idcategoria' => 'required',
        'idlote' => 'required',
        'nombre' => 'required|min:3',

        'precioUnitario' => 'required|numeric|min:0',
        'estado' => 'required',
        
    ];
}
