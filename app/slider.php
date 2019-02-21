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

    public function archivos()
    {
        return $this->hasMany(archivo_slider::class,'id_slider');
    }

    public function imagenes()
    {
        return $this->hasMany(foto_slider::class,'id_slider');
    }
}
