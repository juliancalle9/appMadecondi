<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $primaryKey = 'documento';
    protected $fillable = [
        'documento', 'nombre', 'apellidos', 'telefono', 'correoElectronico', 'direccion'
    ];

    public static $rules =[
        'documento' => 'required|exists:clients,documento|numeric',
        'nombre' => 'required',
        'apellidos' => 'required',
        'telefono' => 'required|numeric',
        'correoElectronico',
        'direccion' => 'required'
         
    ];
    
}
