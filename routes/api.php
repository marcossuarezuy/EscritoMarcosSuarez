<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;

Route::get('/usuario', [PersonaController::class, 'ListarTodos']);
