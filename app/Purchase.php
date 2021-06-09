<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $primaryKey = 'idcompra';
    protected $fillable = [
        'fechacompra', 'id'
    ];
    public $timestamps = false;
}
