<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    protected $table = 'Practica';

    //
    protected $fillable = [
        'nombre', 
        'descripcion',
        'fecha',
        'id_laboratorio' 
        
    ];


    public function laboratorio()
    {
        return $this->belongsTo('App\Laboratorio', 'id_laboratorio', 'id');
    }

    public function archivos()
    {
        return $this->hasMany(archivo_practica::class,'id_practica');
    }

    public function imagenes()
    {
        return $this->hasMany(foto_practica::class,'id_practica');
    }
    
}
