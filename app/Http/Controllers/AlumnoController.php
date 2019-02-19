<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;

class AlumnoController extends Controller
{
    //

    public function show_Alumno(Alumno $alumno)
    {
        return $alumno;
    }

    public function update_alumno(Request $request, Alumno $alumno)
    {
        $alumno->update($request->all());
        return response()->json($alumno);
    }




}
