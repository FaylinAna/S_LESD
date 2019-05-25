<?php

namespace App\Http\Controllers;
//use App\Http\Requests\UploadReque;
use Illuminate\Http\Request\UploadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\archivo_equipo;
use App\foto_equipo;
use App\Practica;
use App\Laboratorio;

class practicaController extends Controller
{
    //

    public function showall($id)
    {
        $laboratorio = Laboratorio::find($id);
        return($laboratorio->practica()->get());
    }

    public function showfind($id)
    {
        return $practica = Practica::findOrFail($id);
    }


    public function store(Request $request,$id)
    {
           
            $Laboratorio = Laboratorio::find($id);
        
            return   Practica::create([
            'nombre' => $$request['nombre'],
            'descripcion' => $request['descripcion'],
            ]);
               
    }
    

    public function update(Request $request,$id)
    {
          
            $practica = Practica::find($id);
            $practica->nombre = $request->get('nombre');
            $practica->descripcion = $request->get('descripcion');
            $practica->save();
       
    }

    public function destroy(Request $request,$id)
    {
      
      $equipo = Practica::find($id);
      $equipo->delete();
    
    }


}
