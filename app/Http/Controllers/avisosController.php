<?php
namespace App\Http\Controllers;
use App\archivo_aviso;
use App\foto_aviso;
use App\Aviso;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


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
        
            return Aviso::create([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'fecha' => Carbon::now()->toDateString()
            ]);
 
    }


    public function store_files(Request $request)
    {
        foreach( $request->file('archivos') as $file)
        {
            $file->move(
                  base_path() . '/public/archivos',$file->getClientOriginalName()
              ); 
              foto_aviso::create([
                  'id_aviso'=>$data->id,
                  'nombre'=>(string)$file->getClientOriginalName()
              ]);
        }

    }
    public function store_imagens(Request $request)
    {
        foreach( $request->file('imagenes') as $file)
        {
            $file->move(
                  base_path() . '/public/archivos',$file->getClientOriginalName()
              ); 
              foto_aviso::create([
                  'id_aviso'=>$data->id,
                  'nombre'=>(string)$file->getClientOriginalName()
              ]);
        }

    }
    
    public function destroy(Request $request,$id)
    {
      
      $aviso = Aviso::find($id);
      $A =  foto_aviso::find($id);
      $F =  archivo_aviso::find($id);

     
      Storage::delete('/public/documentos/'.$A->nombre);//verificar nobre de archivo
      Storage::delete('/public/documentos/'.$F->nombre);
      $aviso->delete();
      $A->delete();
      $F->delete();
    }

    public function update(Request $request,$id)
    {
        //recordar no funciona con las imagenes
          
            $aviso = aviso::find($id);
            $A =  foto_aviso::find($id);
            $F =  archivo_aviso::find($id);

            $aviso->nombre = $request->get('nombre');
            $aviso->descripcion = $request->get('descripcion');
            $aviso->fecha = Carbon::now()->toDateString();
            $aviso->save();

          if($request->hasfile('Documentos'))
            {
                foreach( $F->file('Documentos') as $file){
                    $file->move(
                        base_path() . '/public/documentos',$file->getClientOriginalName()
                    ); 
                    archivos_aviso::create([
                        'id_aviso'=>$F->id,
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
    }
}
