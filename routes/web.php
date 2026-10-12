<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DramaController;
use App\Http\Controllers\DramaJsonController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::redirect('/', '/dramas');

Route::get('/hola/{nombre?}', function (string $nombre = 'Juan') {
    return view('hola', ['nombre' => $nombre]);
});

Route::middleware('registrar')->prefix('dramas')->name('dramas.')->group(function () {
    Route::get('/', [DramaController::class, 'index'])->name('index');
    Route::get('/create', [DramaController::class, 'create'])->name('create');
    Route::post('/', [DramaController::class, 'store'])->name('store');
    Route::get('/{drama}/edit', [DramaController::class, 'edit'])->name('edit');
    Route::put('/{drama}', [DramaController::class, 'update'])->name('update');
    Route::patch('/{drama}/estado', [DramaController::class, 'cambiarEstado'])->name('estado');
    Route::get('/{drama}', [DramaController::class, 'show'])->name('show');
    Route::delete('/{drama}', [DramaController::class, 'destroy'])->name('destroy');
});

Route::middleware('registrar')->prefix('json')->name('json.')->group(function () {
    Route::get('/dramas', [DramaJsonController::class, 'index'])->name('dramas.index');
    Route::get('/dramas/{id}', [DramaJsonController::class, 'show'])->name('dramas.show');
});
