<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\archivo_slider;
use App\foto_slider;
use App\slider;

class sliderController extends Controller
{
    public function showall()
    {
        return slider::all();
    }

    public function showfind($id)
    {
        return $slider = slider::findOrFail($id);
    }


    public function store(Request $request)
    {
            $data=$request->all();
        
            slider::create([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'fecha' => Carbon::now()->toDateString()
            ]);
            foreach( $request->file('Documentos') as $file){
                $file->move(
                      base_path() . '/public/documentos',$file->getClientOriginalName()
                  ); 
                  archivos_slider::create([
                      'id_slider'=>$data->id,
                      'nombre'=>(string)$file->getClientOriginalName()
                  ]);
              }
              foreach( $request->file('Imagen') as $file){
                $file->move(
                      base_path() . '/public/documentos',$file->getClientOriginalName()
                  ); 
                  foto_slider::create([
                      'id_slider'=>$data->id,
                      'nombre'=>(string)$file->getClientOriginalName()
                  ]);
              }

              return -back()
              ->with('msj','se guardo correctamente');
       
    }
    public function getImages($id)
    {
        return foto_slider::where('id_slider',$id)->get();
    }

    public function getFiles($id)
    {
        return archivos_slider::where('id_slider',$id)->get();
    }

    public function update(Request $request,$id)
    {
          
            $slider = slider::find($id);

            $slider->nombre = $request->get('nombre');
            $slider->descripcion = $request->get('descripcion');
            $slider->fecha = $request->get('fecha');
            $slider->save();

            if($request->hasfile('Documentos'))
            {
                foreach( $request->file('Documentos') as $file){
                    $file->move(
                        base_path() . '/public/documentos',$file->getClientOriginalName()
                    ); 
                    archivos_slider::create([
                        'id_slider'=>$data->id,
                        'nombre'=>(string)$file->getClientOriginalName()
                    ]);
                }
            }
            if($request->hasfile('Imagen'))
            {
                foreach( $request->file('Imagen') as $file){
                    $file->move(
                        base_path() . '/public/documentos',$file->getClientOriginalName()
                    ); 
                    foto_slider::create([
                        'id_slider'=>$data->id,
                        'nombre'=>(string)$file->getClientOriginalName()
                    ]);
                }
            }

              return -back()
              ->with('msj','se guardo correctamente');
       
    }





    public function destroy(Request $request,$id)
    {
      
      $slider = slider::find($id);
      $A =  foto_slider::find($id);
      $F =  foto_slider::find($id);

     
      Storage::delete('/public/documentos/'.$A->nombre);//verificar nobre de archivo
      Storage::delete('/public/documentos/'.$F->nombre);
      $slider->delete();
      $A->delete();
      $F->delete();

      return -back()
              ->with('msj','se elimino correctamente');
   
      
    }
}
