<?php

use App\Models\Tramite;
use Illuminate\Http\Request;
use App\Models\Administrador;
use App\Http\Controllers\Prueba;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TramiteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TramiteEtapaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/usuario',UsuarioController::class);
Route::apiResource('/administrador',AdministradorController::class);
Route::apiResource('/tramite', TramiteController::class);
Route::apiResource('/remitente',ClienteController::class);
Route::apiResource('tramite-etapas', TramiteEtapaController::class);

Route::put('/tramite-etapas/{hoja_ruta}/{numero_etapa}', [TramiteEtapaController::class, 'update']);

// Rutas para autenticación y actualización de contraseña
Route::post('login', [AuthController::class, 'login']);
Route::put('update-password/{ci}', [AuthController::class, 'updatePassword']);
