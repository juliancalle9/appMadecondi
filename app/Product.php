<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'idproducto';
    protected $fillable = [
        'nombre','preciounitario','cantidad','idcategoria'
    ];

    public $timestamps = false;

    
}
