<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

<<<<<<< Updated upstream
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
=======
Route::post('/usuario', [PersonaController::class, 'Crear']);
Route::delete('/usuario/{d}', [PersonaController::class, 'Eliminar']);
Route::put('/usuario/{d}', [PersonaController::class, 'Modificar']);
>>>>>>> Stashed changes
