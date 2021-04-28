<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    protected $primaryKey = 'idlote';
    protected $fillable = [
        'nombre','fechaFabricacion','fechaVencimiento','cantidad'
    ];
    public $timestamps = false;
}
