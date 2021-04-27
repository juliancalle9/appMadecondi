<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'idproducto';
    protected $fillable = [
        'nombre','preciounitario','estado','idcategoria','idlote'
    ];
    public $timestamps = false;
}
