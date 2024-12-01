<?php

use App\Models\Pasien;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index_user');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/pasien', function () {
    return view('info_pasien', ['title' => 'Home Page', 'name' => 'Informasi Pasien', 'pasien' => Pasien::all()]);
});

// Route::get('/payment', function () {
//     return view('payment', ['title' => 'Home Page / Payment Management', 'name' => 'Payment Management', 'records' => Payment::all()]);
// });
