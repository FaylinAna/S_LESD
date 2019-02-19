<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;

class HomeController extends Controller
{
    public function allAlumno()
    {
        return Configuracion::all();
    }

    public function update_Configuracion(Request $request,Configuracion $Configuracion)
    {
        $Configuracion->update($request->all());
        return response()->json($Configuracion);
    }


}
