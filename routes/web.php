<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index_user');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/pasien', function () {
    return view('info_pasien');
});
