<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primarykey = 'idcategoria';
    protected $fillable = [
        'idcategoria','nombre', 'descripcion'
    ];
}
