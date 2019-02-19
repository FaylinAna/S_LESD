<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Instructor;
use App\Alumno;

class InstructorController extends Controller
{
    //
    public function allinstructor()
    {
        return Instructor::all();
    }
    public function allAlumno()
    {
        return Alumno::all();
    }

    public function showInstructor(Instructor $instructor)
    {
        return $instructor;
    }

    public function showAlumno(Alumno $alumno)
    {
        return $alumno;
    }

    public function store_instructor(Request $request)
    {
        $instructor = Instructor::create($request->all());
        return response()->json($instructor);

        //agregar el crear usuario 
    }
    public function store_alumno(Request $request)
    {
        $instructor = Instructor::create($request->all());
        return response()->json($instructor);


        //agregar el crear usuario 
    }

    public function store_alumno_archivo(Request $request)
    {
       /* $archivo=array();
        $nombre=$request->file('archivo')->getClientOriginalName();
        
        foreach(nombre as $linea) {
            $archivo[] = $line;
           }
        
        $alumno = alumno::create([
            'clave'->$archivo[0];
            'nombre'->$archivo[1];
            'apellidos'->$archivo[2];
            'rol'->$archivo[3];
            'id_user'$archivo[4];
            ]);
        
        return back()
        ->with('msj','se guardo correctamente');*/
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