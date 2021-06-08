<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'nit', 'nombre','direccion','telefono','idciudad', 'correoelectronico', 'estado'
    ];
    public $timestamps = false;
    public function cities()
    {
     return $this->hasMany('App\City');
    }
    
}
