<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primarykey = 'idproducto';
    protected $fillable = [
        'idproducto','nombre','preciounitario','idcategoria'
    ];
}
