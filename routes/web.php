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
Route::get('/dramas/create', [DramaController::class, 'create'])->name('dramas.create');
Route::post('/dramas', [DramaController::class, 'store'])->name('dramas.store');
Route::get('/dramas/{drama}/edit', [DramaController::class, 'edit'])->name('dramas.edit');
Route::put('/dramas/{drama}', [DramaController::class, 'update'])->name('dramas.update');

