<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;

Route::post('/usuario', [PersonaController::class, 'Crear']);
Route::delete('/usuario/{d}', [PersonaController::class, 'Eliminar']);