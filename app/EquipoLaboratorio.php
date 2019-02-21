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


    public function archivos()
    {
        return $this->hasMany(archivo_equipo::class,'id_equipo');
    }

    public function imagenes()
    {
        return $this->hasMany(foto_equipo::class,'id_equipo');
    }

}
