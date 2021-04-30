<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    protected $table = 'lots';
    protected $primaryKey = 'idlote';
    protected $fillable = [
        'nombre','fechaFabricacion','fechaVencimiento','cantidad'
    ];
    public $timestamps = false;
    public static $rules =[
        'nombre' => 'required|min:3',
        'fechaFabricacion' => 'required',
        'fechaVencimiento' => 'required',
        'cantidad' => 'required',
        
    ];
}

