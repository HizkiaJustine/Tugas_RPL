<?php

use App\Http\Controllers\PasienController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index_user');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/pasien', [PasienController::class, 'index'])->name('info_pasien');
Route::get('/edit_pasien/{id}', [PasienController::class, 'edit'])->name('edit_pasien');
Route::delete('/delete_pasien/{id}', [PasienController::class, 'destroy'])->name('delete_pasien');
Route::put('/update_pasien/{id}', [PasienController::class, 'update'])->name('update_pasien');
Route::get('/pasien/create', [PasienController::class, 'create'])->name('create_pasien');
Route::post('/pasien', [PasienController::class, 'store'])->name('store_pasien');

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);

// Route::get('/payment', function () {
//     return view('payment', ['title' => 'Home Page / Payment Management', 'name' => 'Payment Management', 'records' => Payment::all()]);
// });
