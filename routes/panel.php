<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\GameController;
// Route::get('/',[GameController::class,'index']);
// Route::get('/games/create',[GameController::class,'create']);
// Route::post('/games/store',[GameController::class,'store']);


Route::resource('games', GameController::class);
