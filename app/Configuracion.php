<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    use Notifiable;
    protected $table = 'Configuracion';
    //
    protected $fillable = [
        'vision', 'mision', 'responsable','horario','logo',
    ];
}
