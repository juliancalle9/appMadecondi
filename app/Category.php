<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'idcategoria';
    protected $fillable = [
        'idcategoria','nombre', 'descripcion'
    ];
    public $timestamps = false;
    public static $rules =[
<<<<<<< HEAD
        'idcategoria' => 'required|unique:categories,idcategoria',
=======
        'idcategoria' => 'required',
>>>>>>> 45872db7df71d95793d1102a6bd706c4cd06a649
        'nombre' => 'required',
        'descripcion' 
      ];
}
