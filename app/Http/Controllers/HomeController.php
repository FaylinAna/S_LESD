<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;

class HomeController extends Controller
{
    public function allConfiguracion()
    {
        return Configuracion::all();
    }

    //incluye mision vision etc
    public function update_Configuracion(Request $request,Configuracion $Configuracion)
    {
        $Configuracion->update($request->all());
        return response()->json($Configuracion,'se guardo correctamente');
    }


}
