<?php

namespace App\Http\Controllers;
//use App\Http\Requests\UploadReque;
use Illuminate\Http\Request\UploadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Laboratorio;

class laboratorioController extends Controller
{
    public function showall()
    {
        return Laboratorio::all();
    }

    public function showfind($id)
    {
        return $laboratorio = Laboratorio::findOrFail($id);
    }


    public function store(Request $request)
    {
            $data=$request->all();
        
            return   Laboratorio::create([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            ]);
               
    }
    

    public function update(Request $request,$id)
    {
          
            $laboratorio = Laboratorio::find($id);

            $laboratorio->nombre = $request->get('nombre');
            $laboratorio->descripcion = $request->get('descripcion');
            $laboratorio->save();

      

       
    }

    public function destroy(Request $request,$id)
    {
      
      $laboratorio = Laboratorio::find($id);
      $laboratorio->delete();
    
    }
}
