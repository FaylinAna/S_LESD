<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    
    protected $table = 'Instructor';

    //
    protected $fillable = [
        'REP',
        'nombre', 
        'apellidos',
        'rol',
        'user_id'
    ];
}
