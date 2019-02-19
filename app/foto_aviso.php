<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class foto_aviso extends Model
{
    //
    
    protected $table = 'foto_aviso';
    //
    protected $fillable = [
        'nombre', 'id_aviso'
    ];
}
