<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'idcategoria';
    protected $fillable = [
        'nombre', 'descripcion'
    ];
    public $timestamps = false;
    public static $rules =[
        'idcategoria' => 'required|exists:city,nombre',
        'nombre' => 'required',
        'descripcion' => 'required'

      ];
}
