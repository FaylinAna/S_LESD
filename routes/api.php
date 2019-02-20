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

Route::get('/', 'PrincipalController@index');
Route::get('/directorio', 'PrincipalController@directorio');
Route::get('/acercade', 'PrincipalController@acercade');
Route::get('/avisos', 'PrincipalController@avisos');
///
Route::get('/alumno', 'AlumnoController@show_Alumno');//muetra los datos del alumno
Route::get('/alumno/practicas', 'AlumnoController@show_Practica');
Route::get('/alumno/practica/{id}/show','AlumnoController@showpracticaalumno');
Route::get('/alumno/practica/{id}/getImages','AlumnoController@getImages');
Route::get('/alumno/practica/{id}/getFiles','AlumnoController@getFiles');

//
  // Rutas con el prefijo api/admin

Route::group(['prefix' => 'admin'], function()
{
    Route::get('instructor', 'InstructorController@allinstructor');//muetra los datos del alumno
    Route::get('alumno', 'InstructorController@allalumno');
    Route::get('instructor/{id}/show','InstructorController@showInstructor');
    Route::get('{id}/show','InstructorController@showalumno');
    Route::post('instructor/nuevo','InstructorController@store_instructor');
    Route::post('alumno/nuevo','InstructorController@store_alumno');
    Route::get('alumno/nuevo/archivo','InstructorController@import_alumno_archivo');//store_alumno_archivo
});

Route::get('/admin/instructor', 'InstructorController@allinstructor');//muetra los datos del alumno
Route::get('/admin/alumno', 'InstructorController@allalumno');
Route::get('/admin/instructor/{id}/show','InstructorController@showInstructor');
Route::get('/admin/alumno/{id}/show','InstructorController@showalumno');

Route::post('/admin/instructor/nuevo','InstructorController@store_instructor');
Route::post('/admin/alumno/nuevo','InstructorController@store_alumno');

Route::get('/admin/alumno/nuevo/archivo','InstructorController@import_alumno_archivo');//store_alumno_archivo

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












