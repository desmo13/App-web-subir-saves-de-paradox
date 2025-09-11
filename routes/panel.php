<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('panel');
})->name('panel');

Route::get('/Login', function () {
    return view('login');
})->name('Login');

Route::get('/Registro', function () {
    return view('panel.registro');
})->name('Registro');

Route::post('/Login', function () {

});
