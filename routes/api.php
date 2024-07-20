<?php

use App\Http\Controllers\PersonaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/usuario', [PersonaController::class, 'Crear']);
Route::delete('/usuario/{d}', [PersonaController::class, 'Eliminar']);
Route::put('/usuario/{d}', [PersonaController::class, 'Modificar']);
