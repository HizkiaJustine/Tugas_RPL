<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PasienController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\AuthController;

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

Route::get('/rekammedis/{id}', [RekamMedisController::class, 'show'])->name('rekammedis');
// Route::get('/payment', function () {
//     return view('payment', ['title' => 'Home Page / Payment Management', 'name' => 'Payment Management', 'records' => Payment::all()]);
// });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
