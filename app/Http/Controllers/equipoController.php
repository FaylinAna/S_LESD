<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
        
            EquipoLaboratorio::create([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            ]);
           

              return -back()
              ->with('msj','se guardo correctamente');
       
    }

    public function store_file(Request $request)
    {
        foreach( $request->file('archivos') as $file){
            $file->move(
                  base_path() . '/public/archivos',$file->getClientOriginalName()
              ); 
              archivos_equipo::create([
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

            if($request->hasfile('Documentos'))
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
            }

              return -back()
              ->with('msj','se guardo correctamente');
       
    }





    public function destroy(Request $request,$id)
    {
      
      $equipo = EquipoLaboratorio::find($id);
      $F = foto_equipo::where('id_equipo',$id)->get();
      $A = archivos_equipo::where('id_equipo',$id)->get();

      Storage::delete('/public/documentos/'.$A->nombre);//verificar nobre de archivo
      Storage::delete('/public/documentos/'.$F->nombre);
      $equipo->delete();
      $A->delete();
      $F->delete();

      return -back()
              ->with('msj','se elimino correctamente');
   
      
    }
}
