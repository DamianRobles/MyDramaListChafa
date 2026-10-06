<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DramaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function () {
    return view('hola', ['nombre'=>'Juan']);
});

Route::get('/dramas',[DramaController::class,'index'])->name('dramas.index');
