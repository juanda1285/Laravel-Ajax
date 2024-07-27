<?php

use App\Http\Controllers\UserController;

//Ruta por defecto
Route::get('/', function () {
    return view('register');
});

//Ruta y Controlador para el registro
Route::post('/register', [UserController::class, 'store'])->name('register.store');

