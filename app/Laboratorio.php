<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    //
 
    protected $table = 'Laboratorio';

    //
    protected $fillable = [
        'nombre', 
        'descripcion', 
        
    ];


    public function practicas()
    {
        return $this->hasMany('App\Practica', 'id_laboratorio', 'id');
        

    }
}
