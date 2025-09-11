<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');  // vista del login
Route::post('/login', [AuthController::class, 'login'])->name('login.post'); // procesar login
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');  // vista del registro
Route::post('/register', [AuthController::class, 'register'])->name('register.post'); // procesar registro


