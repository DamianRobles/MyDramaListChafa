<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('/hola', function () {
    return view('Hola', ['nombre'=>'Juan']);
});
