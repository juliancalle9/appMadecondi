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

   
    
}
