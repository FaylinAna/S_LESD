<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class archivo_aviso extends Model
{
    //
    protected $table = 'archivo_aviso';
    //
    protected $fillable = [
        'nombre', 'id_aviso'
    ];
}
