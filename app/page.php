<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class page extends Model{
 
protected $table= "PaginaWeb";

    protected $primaryKey = 'id';
    protected $fillable = [
        'correoElectronico'
    ];

    public $timestamps = false;

}
