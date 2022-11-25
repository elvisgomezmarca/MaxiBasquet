<?php

use App\Http\Controllers\API\DelegadoController;
use App\Http\Controllers\API\JuezController;
use App\Http\Controllers\API\JugadorController;
use App\Http\Controllers\API\RegistroController;
use App\Http\Controllers\API\EquipoController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RolPartidosController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class,'login']);
Route::post('/register', [AuthController::class,'register']);
Route::group(['middleware' => 'api'//,
    //'prefix' => 'auth'
], function ($router) {
    //Route::post('/login', [AuthController::class,'login']);
      //Route::post('login', 'AuthController@login');
   // Route::post('/register', [AuthController::class,'register']);
    Route::post('/logout', [AuthController::class,'logout']);
    Route::get('/profile', [AuthController::class,'profile']);
    //Route::post('refresh', [AuthController::class,'refresh']);
    //Route::post('me', [AuthController::class,'me']);
});
*/



Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::post('/pre-registro', [RegistroController::class,'store']);
Route::get('/listar-puntos-orden',[EquipoController::class,'showOrden']);

Route::group(['Middleware'=>'api'],function(){
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('profile', [AuthController::class, 'profile']);

    Route::get('/index_registro', [RegistroController::class,'index']);

    //---------rutas jugador
    Route::get('/index-Jugador/{id}', [JugadorController::class,'index']);
    Route::post('/add-jugador', [JugadorController::class,'store']);
    Route::get('/listar-jugador',[JugadorController::class,'show']);
    Route::put('/editar-jugador/{id}', [JugadorController::class,'update']);
    Route::delete('/eliminar-jugador/{id}', [JugadorController::class,'destroy']);

    //---------rutas juez
    Route::get('/index', [JuezController::class,'index']);
    Route::post('/add-juez', [JuezController::class,'store']);
    Route::get('/listar-juez/{id}', [JuezController::class,'show']);
    Route::put('/editar-juez/{id}', [JuezController::class,'update']);
    Route::delete('/eliminar-juez/{id}', [JuezController::class,'destroy']);
    //---------rutas delegado
    Route::get('/index-Delegado/{id}', [DelegadoController::class,'index']);
    Route::post('/add-delegado', [DelegadoController::class,'store']);
    Route::get('/listar-delegado',[DelegadoController::class,'show']);
    Route::put('/editar-delegado/{id}', [DelegadoController::class,'update']);
    Route::delete('/eliminar-delegado/{id}', [DelegadoController::class,'destroy']);

    //------rutas Equipos
    Route::get('/listar-equipos',[EquipoController::class,'show']);

    //------rutas partidos
    Route::get('/listar-partidos',[RolPartidosController::class,'show']);
    Route::post('/add-partidos',[RolPartidosController::class,'store']);
});
