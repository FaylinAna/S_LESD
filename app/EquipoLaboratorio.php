<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipoLaboratorio extends Model
{
    //

   
    protected $table = 'EquipoLaboratorio';
    //
    protected $fillable = [
        'nombre','descripcion'
    ];
}
