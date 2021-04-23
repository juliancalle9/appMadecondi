<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $primaryKey = 'idciudad';
    protected $fillable = [
        'nombre'
    ];
    public $timestamps = false;
}
