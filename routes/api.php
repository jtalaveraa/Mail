<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PersonasController; 
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SanctumController;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\ImagenesController;
use App\Http\Controllers\UsersController;
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

Route::post('login', [AuthController::class, 'login']);

Route::post('register', [AuthController::class, 'register']);
Route::get('activate/{user}', [CuentasController::class, 'activate'])->name('activate')->middleware('signed');
Route::post('reactivate', [CuentasController::class, 'reActivate']);


Route::middleware(['auth:sanctum'])->GROUP(function () {

    // FOTOS DE PERFIL
    Route::middleware(['admin/user'])->GROUP(function () {    
        Route::post('subirImagen', [ImagenesController::class, 'subirImagen']); 
        Route::get('verImagen', [ImagenesController::class, 'verImagen']);
        Route::post('actualizarImagen', [ImagenesController::class, 'editarImagen']);
    });

    // RUTAS DE ADMIN
    Route::middleware(['admin'])->GROUP(function () {  
        // USUARIOS
        Route::get('usuarios', [UsersController::class, 'index']);
        Route::get('usuarios/{id}', [UsersController::class, 'show']);
        Route::put('usuarios/{id}', [UsersController::class, 'update']);
        Route::delete('usuarios/{id}', [UsersController::class, 'destroy']);
        Route::put('usuarios', [UsersController::class, 'updateRol']);
    });

});









