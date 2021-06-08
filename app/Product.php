<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'idproducto';
    protected $fillable = [
        'nombre','precioventa','preciocompra','stock','idcategoria'
    ];

    public $timestamps = false;

    
}
