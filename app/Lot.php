<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{

    protected $primaryKey = 'idlote';
    protected $fillable = [
        'fechaFabricacion','fechaVencimiento','cantidad'
    ];
    public $timestamps = false;
    public static $rules =[
        
        'fechaFabricacion' => 'required',
        'fechaVencimiento' => 'required',
        'cantidad' => 'required',
        
    ];
}

