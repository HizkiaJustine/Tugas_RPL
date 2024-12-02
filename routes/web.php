<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResepObatController;

Route::get('/', function () {
    return view('index_user');
});

Route::get('/about', function () {
    return view('about');
});

Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/pasien', [PasienController::class, 'index'])->name('info_pasien');
    Route::get('/edit_pasien/{id}', [PasienController::class, 'edit'])->name('edit_pasien');
    Route::delete('/delete_pasien/{id}', [PasienController::class, 'destroy'])->name('delete_pasien');
    Route::put('/update_pasien/{id}', [PasienController::class, 'update'])->name('update_pasien');
    Route::get('/pasien/create', [PasienController::class, 'create'])->name('create_pasien');
    Route::post('/pasien', [PasienController::class, 'store'])->name('store_pasien');
    Route::get('/rekammedis/{id}', [RekamMedisController::class, 'show'])->name('rekammedis');
});

Route::post('/resepobat', [ResepObatController::class, 'store'])->name('store_resepobat');
Route::get('/resepobat/create', [ResepObatController::class, 'create'])->name('create_resepobat');
Route::post('/resepobat', [ResepObatController::class, 'store'])->name('info_resepobat');

Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/test', function () {
        return view('test_middleware');
    });
});

// Uncomment and adjust these routes as needed
// Route::middleware(['auth', 'role:dokter'])->group(function () {
//     Route::get('/test/dokter', function () {
//         return view('test_middleware');
//     });
// });

// Route::middleware(['auth', 'role:kasir'])->group(function () {
//     Route::get('/test/kasir', function () {
//         return view('test_middleware');
//     });
// });

// Route::middleware(['auth', 'role:administrator'])->group(function () {
//     Route::get('/test/administrator', function () {
//         return view('test_middleware');
//     });
// });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);