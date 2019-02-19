<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class foto_equipo extends Model
{
    //
    protected $table = 'foto_equipo';
    //
    protected $fillable = [
        'nombre', 'id_equipo'
    ];
}
