<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaliificacionController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\FestivoController;
use App\Http\Controllers\LetraController;
use App\Http\Controllers\PuntosParadaController;
use App\Http\Controllers\PuntosparadaRecorridoController;
use App\Http\Controllers\RecorridoController;
use App\Http\Controllers\SemanaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

#inicio de sesión
//ruta para el registro de usuarios
    Route::post('/auth/register',[AuthController::class,'register']);
//ruta para el login de usuarios
    Route::post('/auth/login',[AuthController::class,'login']);
//Ruta para el logout de Usuario
    Route::post('/auth/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');
#fin inicio de sesión

#rutas de empresa
    //mostrar empresa
    Route::get('empresa',[EmpresaController::class,'index']);
    //editar empresa
    Route::put('empresa/{id}',[EmpresaController::class,'update']);
    //crear empresa
    Route::post('/register/empresa',[EmpresaController::class,'store']);
    //elimiinar empresa
    Route::delete('empresa/{id}',[EmpresaController::class,'destroy']);
    //caosul name empresas
    Route::get('empresa_consulta_name',[EmpresaController::class,'consultaNameEmpresa']);
#FIN RUTAS EMPRESA

#rutas de recorrido
    //mostrar recorrido
    Route::get('recorrido',[RecorridoController::class,'index']);
    //editar recorrido
    Route::put('recorrido/{id}',[RecorridoController::class,'update']);
    //crear recorrido
    Route::post('/register/recorrido',[RecorridoController::class,'store']);
    //elimiinar recorrido
    Route::delete('recorrido/{id}',[RecorridoController::class,'destroy']);
    //consulta recorrido (punto inicio,final,nuero ruta)
    Route::get('recorrido_consulta',[RecorridoController::class,'ConsultaRecorridos_rutas_empresa']);
    //consulta recorrido (punto inicio,final,nuero ruta,imegen ruta)
    Route::get('recorrido_consulta_imagen_ruta_empresa',[RecorridoController::class,'ConsultaRecorridos_Imagen_ruta_empresa']);

#FIN RUTAS RECORIDO

#rutas de puntos_parada
    //mostrar puntos de parada
    Route::get('paradas',[PuntosParadaController::class,'index']);
    //editar puntos de parada
    Route::put('paradas/{id}',[PuntosParadaController::class,'update']);
    //crear puntos de parada
    Route::post('/register/paradas',[PuntosParadaController::class,'store']);
    //elimiinar puntos de parada
    Route::delete('paradas/{id}',[PuntosParadaController::class,'destroy']);
#FIN RUTAS PUNTOS DE PARADA

#rutas de festivos
    //mostrar festivos
    Route::get('festivos',[FestivoController::class,'index']);
    //editar jornada
    Route::put('festivos/{id}',[FestivoController::class,'update']);
    //crear festivos
    Route::post('/register/festivos',[FestivoController::class,'store']);
    //elimiinar festivos
    Route::delete('festivos/{id}',[FestivoController::class,'destroy']);
#FIN RUTAS festivos

#rutas de semanaa
    //mostrar semana
    Route::get('semanas',[SemanaController::class,'index']);
    //editar semanas
    Route::put('semanas/{id}',[SemanaController::class,'update']);
    //crear fines_semana
    Route::post('/register/semanas',[SemanaController::class,'store']);
    //elimiinar semanas
    Route::delete('semanas/{id}',[SemanaController::class,'destroy']);
#FIN RUTAS semana


#rutas de letra
    //mostrar letra
    Route::get('letra',[LetraController::class,'index']);
    //editar letra
    Route::put('letra/{id}',[LetraController::class,'update']);
    //crear letra
    Route::post('/register/letra',[LetraController::class,'store']);
    //elimiinar letra
    Route::delete('letra/{id}',[LetraController::class,'destroy']);
#FIN RUTAS LETRA

#rutas de puntosparada_recorrido
    //mostrar puntosparada_recorrido
    Route::get('Paradarecorido',[PuntosparadaRecorridoController::class,'index']);
    //editar puntosparada_recorrido
    Route::put('Paradarecorido/{id}',[PuntosparadaRecorridoController::class,'update']);
    //crear puntosparada_recorrido
    Route::post('/register/Paradarecorido',[PuntosparadaRecorridoController::class,'store']);
    //elimiinar puntosparada_recorrido
    Route::delete('Paradarecorido/{id}',[PuntosparadaRecorridoController::class,'destroy']);
#FIN RUTAS puntosparada_recorrido

#rutas de caliificacion
    //mostrar caliificacion
    Route::get('caliificacion',[CaliificacionController::class,'index']);
    //editar caliificacion
    Route::put('caliificacion/{id}',[CaliificacionController::class,'update']);
    //crear caliificacion
    Route::post('/register/caliificacion',[CaliificacionController::class,'store']);
    //elimiinar caliificacion
    Route::delete('caliificacion/{id}',[CaliificacionController::class,'destroy']);
#FIN RUTAS caliificacion


