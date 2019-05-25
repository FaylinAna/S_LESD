<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home', 'PrincipalController@index');
Route::get('/directorio', 'PrincipalController@directorio');
Route::get('/acercade', 'PrincipalController@acercade');
Route::get('/avisos', 'PrincipalController@avisos');
///

Route::group(['prefix' => 'alumno'], function()
{
    Route::get('show', 'AlumnoController@show_Alumno');//muetra los datos del alumno
    Route::get('practicas', 'AlumnoController@show_Practica');
    Route::get('practica/{id}/show','AlumnoController@showpracticaalumno');
    Route::get('practica/{id}/getImages','AlumnoController@getImages');
    Route::get('practica/{id}/getFiles','AlumnoController@getFiles');
});

//
  // Rutas con el prefijo api/admin

Route::group(['prefix' => 'admin'], function()
{
    Route::get('Config', 'HomeController@allConfiguracion');
    Route::put('Congif/update', 'HomeController@update_Configuracion');
    //
    Route::get('instructor', 'InstructorController@allinstructor');
    Route::get('alumno', 'InstructorController@allalumno');
    Route::get('instructor/{id}/show','InstructorController@showInstructor');
    Route::get('alumno/{id}/show','InstructorController@showalumno');
    Route::post('instructor/nuevo','InstructorController@store_instructor');
    Route::post('alumno/nuevo','InstructorController@store_alumno');
    Route::get('alumno/nuevo/{archivo}','InstructorController@import_alumno_archivo');//store_alumno_archivo
    Route::put('alumno/update', 'InstructorController@update_alumno');
    Route::put('instructor/update', 'InstructorController@update_instructor');
    Route::delete('instructor/eliminar/{id}','InstructorController@delete_instructor');
    Route::delete('alumno/eliminar/{id}','InstructorController@delete_alumno');
    //
    Route::get('aviso','avisosController@showall');
    Route::get('aviso/{id}/show','avisosController@showfind');
    Route::post('aviso/nuevo','avisosController@store');
    Route::put('aviso/update/{id}', 'avisosController@update');
    Route::delete('aviso/eliminar/{id}','avisosController@destroy');
    Route::get('aviso/{id}/getImages','avisosController@getImages');
    Route::get('aviso/{id}/getFiles','avisosController@getFiles');
    Route::post('aviso/nuevo/imagen','avisosController@store_files');
    Route::post('aviso/nuevo/imagen','avisosController@store_imagens');
    //

    Route::get('slider', 'sliderController@showall');
    Route::get('slider/{id}/show','sliderController@showfind');
    Route::post('slider/nuevo','sliderController@store');
    Route::put('slider/update', 'sliderController@update');
    Route::delete('slider/eliminar/{id}','sliderController@delete');
    Route::get('slider/{id}/getImages','sliderController@getImages');
    Route::get('slider/{id}/getFiles','sliderController@getFiles');

    Route::get('equipo', 'equipoController@showall');
    Route::get('equipo/{id}/show','equipoController@showfind');
    Route::post('equipo/nuevo','equipoController@store');
    Route::post('equipo/nuevo/file','equipoController@store_file');
    Route::put('equipo/update/{id}', 'equipoController@update');
    Route::delete('equipo/eliminar/{id}','equipoController@destroy');
    Route::get('equipo/{id}/getImages','equipoController@getImages');
    Route::get('equipo/{id}/getFiles','equipoController@getFiles');

    Route::get('Laboratorio', 'laboratorioController@showall');
    Route::get('Laboratorio/{id}/show','laboratorioController@showfind');
    Route::post('Laboratorio/nuevo','laboratorioController@store');
    Route::post('Laboratorio/nuevo/file','laboratorioController@store_file');
    Route::put('Laboratorio/update/{id}', 'laboratorioController@update');
    Route::delete('Laboratorio/eliminar/{id}','laboratorioController@destroy');
    Route::get('Laboratorio/{id}/getImages','laboratorioController@getImages');
    Route::get('Laboratorio/{id}/getFiles','laboratorioController@getFiles');


});


///
Route::get('/admin/laboratorio/nuevo','laboratorioController@crear');
Route::post('/admin/laboratorio/nuevo','laboratorioController@store');
Route::get('/admin/laboratorio/show','laboratorioController@show');
Route::get('/admin/laboratorio/{id}/edit', 'laboratorioController@edit');
Route::put('/admin/laboratorio/{id}/edit', 'laboratorioController@update');
Route::delete('/admin/laboratorio/delete/{id}', 'laboratorioController@destroy');
//
Route::get('/admin/practica/ver','practicaController@ver');
Route::get('/admin/practica/show/{id}','practicaController@show');
Route::get('/admin/practica/{id}/show','practicaController@showpractica');
Route::get('/admin/practica/{id}/agregar','practicaController@crear');
Route::post('/admin/practica/nuevo','practicaController@store');
Route::get('/admin/practica/{id}/editar', 'practicaController@edit');
Route::put('/admin/practica/{id}/editar', 'practicaController@update');
Route::delete('/admin/practica/{id}', 'practicaController@destroy');
//
Route::get('/admin/avisos/ver','avisosController@show');
Route::get('/admin/avisos/nuevo','avisosController@crear');
Route::post('/admin/avisos/nuevo','avisosController@store');
Route::get('/admin/avisos/{id}/editar', 'avisosController@edit');
Route::put('/admin/avisos/{id}/editar', 'avisosController@update');
Route::delete('/admin/avisos/eliminar/{id}', 'avisosController@destroy');
//
Route::get('/admin/slider/ver','sliderController@show');
Route::get('/admin/slider/nuevo','sliderController@crear');
Route::post('/admin/slider/nuevo','sliderController@store');
Route::get('/admin/slider/{id}/editar', 'sliderController@edit');
Route::put('/admin/slider/{id}/editar', 'sliderController@update');
Route::delete('/admin/slider/{id}', 'sliderController@destroy');
//
Route::get('/admin/manual/ver','manualController@show');
Route::get('/admin/manual/nuevo','manualController@crear');
Route::post('/admin//nuevo','manualController@store');
Route::get('/admin/manual/{id}/editar', 'manualController@edit');
Route::put('{id}/editar', 'manualController@update');
Route::delete('/admin/manual/{id}', 'manualController@destroy');
//












