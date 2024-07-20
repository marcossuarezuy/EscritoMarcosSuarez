<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;

Route::get('/usuario', [PersonaController::class, 'ListarTodos']);
Route::get('/usuario/{d}', [PersonaController::class, 'BuscarUnId']);
Route::post('/usuario', [PersonaController::class, 'Crear']);
Route::delete('/usuario/{d}', [PersonaController::class, 'Eliminar']);
