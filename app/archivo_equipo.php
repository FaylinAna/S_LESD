<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class archivo_equipo extends Model
{
    //
    protected $table = 'archivo_equipo';
    //
    protected $fillable = [
        'nombre', 'id_equipo'
    ];
}
