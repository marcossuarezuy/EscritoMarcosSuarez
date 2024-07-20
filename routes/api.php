<?php

use App\Http\Controllers\PersonaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;

Route::post('/usuario', [PersonaController::class, 'Crear']);
Route::delete('/usuario/{d}', [PersonaController::class, 'Eliminar']);
Route::put('/usuario/{d}', [PersonaController::class, 'Modificar']);
Route::get('/usuario', [PersonaController::class, 'ListarTodos']);
Route::get('/usuario/{d}', [PersonaController::class, 'BuscarUnId']);
