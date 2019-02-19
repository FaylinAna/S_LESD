<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class foto_practica extends Model
{
    //

    protected $table = 'foto_practica';
    //
    protected $fillable = [
        'nombre', 'id_practica'
    ];
}
