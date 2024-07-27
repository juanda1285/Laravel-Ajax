<?php

use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('register');
});

Route::post('/register', [UserController::class, 'store'])->name('register.store');

