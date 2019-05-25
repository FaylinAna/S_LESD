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
        
            return slider::create([
            'nombre' => $data['nombre'],
            ]);
            
       
    }
    public function store_file(Request $request)
    {
        foreach( $request->file('file') as $file){
            $file->move(
                  base_path() . '/public/documentos',$file->getClientOriginalName()
              ); 
              foto_slider::create([
                  'id_slider'=>$data->id,
                  'nombre'=>(string)$file->getClientOriginalName()
              ]);
          }
        
    }

    public function store_archivo(Request $request)
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
            $slider->save();

      /*      if($request->hasfile('Documentos'))
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
            }*/

          
       
    }





    public function destroy(Request $request,$id)
    {
      
      $slider = slider::find($id);
     // $F = foto_slider::where('id_slider',$id)->get();
      //$A = archivos_slider::where('id_slider',$id)->get();

      //Storage::delete('/public/documentos/'.$A->nombre);//verificar nobre de archivo
      //Storage::delete('/public/documentos/'.$F->nombre);
      $slider->delete();
      //$A->delete();
      //$F->delete();

   
   
      
    }
}
