<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'idproducto';
    protected $fillable = [
        'nombre','preciounitario','idcategoria'
    ];
    public $timestamps = false;
    public static $rules =[
        'nombre' => 'required',
        'preciounitario' => 'required|numeric',
        'idcategoria' => 'required'
    ];
}
