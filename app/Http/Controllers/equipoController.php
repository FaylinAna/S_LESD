<?php

namespace App\Http\Controllers;
//use App\Http\Requests\UploadReque;
use Illuminate\Http\Request\UploadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\archivo_equipo;
use App\foto_equipo;
use App\EquipoLaboratorio;



class equipoController extends Controller
{
    //

    public function showall()
    {
        return EquipoLaboratorio::all();
    }

    public function showfind($id)
    {
        return $equipo = EquipoLaboratorio::findOrFail($id);
    }


    public function store(Request $request)
    {
            $data=$request->all();
        
            return   EquipoLaboratorio::create([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            ]);
               
    }
    
    public function store_file(Request $request)
    {
       // return 
       return $request->all();
        foreach( $request->file('archivos') as $file){
        return "aaa";
        return $file->getClientOriginalName();
            $request->move(
                  base_path() . '/public/archivos',$file->getClientOriginalName()
              ); 
              archivo_equipo::create([
                  'id_equipo'=>$data->id,
                  'nombre'=>(string)$file->getClientOriginalName()
              ]);
          }
        
    }

    public function store_imagen(Request $request)
    {
        foreach( $request->file('archivos') as $file){
            $file->move(
                  base_path() . '/public/archivos',$file->getClientOriginalName()
              ); 
              foto_equipo::create([
                  'id_equipo'=>$data->id,
                  'nombre'=>(string)$file->getClientOriginalName()
              ]);
          }
        
    }
    public function getImages($id)
    {
        return foto_equipo::where('id_equipo',$id)->get();
    }

    public function getFiles($id)
    {
        return archivos_equipo::where('id_equipo',$id)->get();
    }

    public function update(Request $request,$id)
    {
          
            $equipo = EquipoLaboratorio::find($id);

            $equipo->nombre = $request->get('nombre');
            $equipo->descripcion = $request->get('descripcion');
            $equipo->save();

       /*     if($request->hasfile('Documentos'))
            {
                foreach( $request->file('Documentos') as $file){
                    $file->move(
                        base_path() . '/public/documentos',$file->getClientOriginalName()
                    ); 
                    archivos_equipo::create([
                        'id_equipo'=>$data->id,
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
                    foto_equipo::create([
                        'id_equipo'=>$data->id,
                        'nombre'=>(string)$file->getClientOriginalName()
                    ]);
                }
            }*/

       
    }

    public function destroy(Request $request,$id)
    {
      
      $equipo = EquipoLaboratorio::find($id);
     // $F = foto_equipo::where('id_equipo',$id)->get();
      //$A = archivos_equipo::where('id_equipo',$id)->get();

      //Storage::delete('/public/documentos/'.$A->nombre);//verificar nobre de archivo
      //Storage::delete('/public/documentos/'.$F->nombre);
      $equipo->delete();
      //$A->delete();
      //$F->delete(); 
    }
}
