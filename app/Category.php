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
        'idcategoria' => 'required',
        'nombre' => 'required',
        'descripcion' => 'required'

      ];
}
