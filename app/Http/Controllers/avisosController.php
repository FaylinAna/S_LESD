<?php

use App\archivo_aviso;
use App\foto_aviso;
use App\Aviso;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class avisosController extends Controller
{
    public function showall()
    {
        return Aviso::all();
    }

    public function showfind($id)
    {
        return $aviso = Aviso::findOrFail($id);
    }


    public function store(Request $request)
    {
            $data=$request->all();
        
            Aviso::create([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'fecha' => Carbon::now()->toDateString()
            ]);
         /*   foreach( $request->file('Documentos') as $file){
                $file->move(
                      base_path() . '/public/documentos',$file->getClientOriginalName()
                  ); 
                  archivos_aviso::create([
                      'id_aviso'=>$data->id,
                      'nombre'=>(string)$file->getClientOriginalName()
                  ]);
              }
              foreach( $request->file('Imagen') as $file){
                $file->move(
                      base_path() . '/public/documentos',$file->getClientOriginalName()
                  ); 
                  foto_aviso::create([
                      'id_aviso'=>$data->id,
                      'nombre'=>(string)$file->getClientOriginalName()
                  ]);
              }*/

              return -back()
              ->with('msj','se guardo correctamente');
       
    }
    public function getImages($id)
    {
        return foto_aviso::where('id_aviso',$id)->get();
    }

    public function getFiles($id)
    {
        return archivos_aviso::where('id_aviso',$id)->get();
    }

    public function update(Request $request,$id)
    {
          
            $aviso = aviso::find($id);

            $aviso->nombre = $request->get('nombre');
            $aviso->descripcion = $request->get('descripcion');
            $aviso->fecha = $request->get('fecha');
            $aviso->save();

            if($request->hasfile('Documentos'))
            {
                foreach( $request->file('Documentos') as $file){
                    $file->move(
                        base_path() . '/public/documentos',$file->getClientOriginalName()
                    ); 
                    archivos_aviso::create([
                        'id_aviso'=>$data->id,
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
                    foto_aviso::create([
                        'id_aviso'=>$data->id,
                        'nombre'=>(string)$file->getClientOriginalName()
                    ]);
                }
            }

              return -back()
              ->with('msj','se guardo correctamente');
       
    }





    public function destroy(Request $request,$id)
    {
      
      $aviso = Aviso::find($id);
      $A =  foto_aviso::find($id);
      $F =  foto_aviso::find($id);

     
      Storage::delete('/public/documentos/'.$A->nombre);//verificar nobre de archivo
      Storage::delete('/public/documentos/'.$F->nombre);
      $aviso->delete();
      $A->delete();
      $F->delete();

      return -back()
              ->with('msj','se elimino correctamente');
   
      
    }
    


}
