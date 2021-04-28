<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $table= "clients";

    protected $primaryKey = 'documento';
    protected $fillable = [
        'documento', 'nombre', 'apellidos', 'telefono', 'correoElectronico', 'direccion', 'estado'
    ];

    public static $rules =[
        'documento' => 'required|unique:clients,documento|numeric',
        'nombre' => 'required',
        'apellidos' => 'required',
        'telefono' => 'required|numeric',
        'correoElectronico',
        'direccion' => 'required',
        'estado' => 'in:1,0',
         
    ];
    
}
