<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;

class AlumnoController extends Controller
{
    //

    public function show_Alumno($id)
    {
        return $alumno = Alumno::findOrFail($id);
    }
    //actualizar perfil
    public function update_alumno(Request $request, Alumno $alumno)
    {
        return $alumno->update($request->all());
        //return response()->json($alumno,'se actualizo correctamente el registro');
    }


   




}
