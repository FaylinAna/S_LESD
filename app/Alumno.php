<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'Alumno';

    protected $fillable = [
        'clave',
        'nombre', 
        'apellidos',
        'rol',
        'id_user'
    ];
}
