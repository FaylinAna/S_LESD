<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class archivo_practica extends Model
{
    //
    protected $table = 'archivo_practica';
    //
    protected $fillable = [
        'nombre', 'id_practica'
    ];
}
