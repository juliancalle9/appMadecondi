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
<<<<<<< HEAD
   
=======
    public static $rules =[
        'idcategoria' => 'required',
        'nombre' => 'required',
        'descripcion' 
      ];
>>>>>>> 65e72a41d7c8351a73641f479eb81f17f27353f2
}
