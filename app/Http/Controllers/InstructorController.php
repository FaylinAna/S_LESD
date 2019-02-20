<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Instructor;
use App\Alumno;
use \Excel;
use App\Http\Requests\ExcelRequest;

class InstructorController extends Controller
{
    //
    public function allinstructor()
    {
        return Instructor::all();
        //return $instructor->append('is_admin')->toArray();
    }
    public function allAlumno()
    {
        return Alumno::all();
    }

    public function showInstructor($id)
    {
        return $instructor=Instructor::findOrFail($id)->append('is_admin')->toArray();
    }

    public function showAlumno($id)
    {
        return $alumno=Alumno::findOrFail($id);
    }

    public function store_instructor(Request $request)
    {
        $instructor = Instructor::create($request->all());
        return response()->json('Se agrego correctamente');

        //agregar el crear usuario 
    }
    public function store_alumno(Request $request)
    {
        $alumno = Alumno::create($request->all());
        return response()->json('Se agrego correctamente');


        //agregar el crear usuario 
    }
  

    public function import_alumno_archivo()
    {
       // $archivo_array = array();
      
        \Excel::load('\storage\app\public\ejemplo.xlsx', function($reader) 
        {
            return $archivo=$reader->get();

           /* $archivo->each(function($columna) {
    
                $alumno = new Alumno;
                $alumno->clave = $columna->clave;
                $alumno->nombre = $columna->nombre;
                $alumno->apellidos = $columna->apellidos;
                $alumno->rol = $columna->rol;
                $id_user->rol = $columna->id_user;
                $alumno->save();
            });*/

        });
            
    
    }
    public function update_instructor(Request $request, Instructor $instructor)
    {
        $instructor->update($request->all());
        return response()->json($instructor);
    }
    public function update_alumno(Request $request, Alumno $alumno)
    {
        $alumno->update($request->all());
        return response()->json($alumno);
    }

    public function delete_instructor(Instructor $instructor)
    {
        $instructor->delete();
        return response()->json(null, 204);
    }
    public function delete_alumno(Alumno $alumno)
    {
        $instructor->delete();
        return response()->json(null, 204);
    }



}