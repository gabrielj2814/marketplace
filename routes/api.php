<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// TODO: agregar node en el contendor de php para instalar dependencias la proyecto que requiren el uso de node

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
