<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    //

    use Notifiable;
    protected $table = 'slider';

    //
    protected $fillable = [
        'nombre', 
        
    ];
}
