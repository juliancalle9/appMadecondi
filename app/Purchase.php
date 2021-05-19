<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $primaryKey = 'idcompra';
    protected $fillable = [
        'fechacompra', 'nit'
    ];
    public $timestamps = false;
}
