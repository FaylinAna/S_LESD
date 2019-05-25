<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    //

   // use Notifiable;
    protected $table = 'Aviso';

    protected $fillable = [
        'nombre', 
        'descripcion',
        'fecha'
    ];


    
    public function archivos()
    {
        return $this->hasMany(archivo_aviso::class,'id_aviso');
    }

    public function imagenes()
    {
        return $this->hasMany(foto_aviso::class,'id_aviso');
    }




}
