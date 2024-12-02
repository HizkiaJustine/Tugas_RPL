<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResepObatController;
use App\Http\Controllers\RekamMedisController;

Route::get('/', function () {
    return view('index_user');
});

Route::get('/about', function () {
    return view('about');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pasien', [PasienController::class, 'index'])->name('info_pasien')->middleware('can:access-pasien');
    Route::get('/edit_pasien/{id}', [PasienController::class, 'edit'])->name('edit_pasien')->middleware('can:access-pasien');
    Route::delete('/delete_pasien/{id}', [PasienController::class, 'destroy'])->name('delete_pasien')->middleware('can:access-pasien');
    Route::put('/update_pasien/{id}', [PasienController::class, 'update'])->name('update_pasien')->middleware('can:access-pasien');
    Route::get('/pasien/create', [PasienController::class, 'create'])->name('create_pasien')->middleware('can:access-pasien');
    Route::post('/pasien', [PasienController::class, 'store'])->name('store_pasien')->middleware('can:access-pasien');
    Route::get('/rekammedis/{id}', [RekamMedisController::class, 'show'])->name('rekammedis')->middleware('can:access-pasien');
});

Route::post('/resepobat', [ResepObatController::class, 'store'])->name('store_resepobat');
Route::get('/resepobat/create', [ResepObatController::class, 'create'])->name('create_resepobat');
Route::post('/resepobat', [ResepObatController::class, 'store'])->name('info_resepobat');

Route::get('/obat', [ObatController::class, 'index'])->name('info_obat');
Route::get('/edit_obat/{id}', [ObatController::class, 'edit'])->name('edit_obat');
Route::delete('/delete_obat/{id}', [ObatController::class, 'destroy'])->name('delete_obat');
Route::put('/update_obat/{id}', [ObatController::class, 'update'])->name('update_obat');
Route::get('/obat/create', [ObatController::class, 'create'])->name('create_obat');
Route::post('/obat/store', [ObatController::class, 'store'])->name('store_obat');

Route::middleware(['auth', 'can:access-pasien'])->group(function () {
    Route::get('/test', function () {
        return view('test_middleware');
    });
    Route::get('/test/pasien', function () {
        return view('test_middleware', ['component' => 'auth-pasien']);
    });
});

// Uncomment and adjust these routes as needed
// Route::middleware(['auth'])->group(function () {
//     Route::get('/test/dokter', function () {
//         return view('test_middleware');
//     })->middleware('can:access-dokter');
// });

// Route::middleware(['auth'])->group(function () {
//     Route::get('/test/kasir', function () {
//         return view('test_middleware');
//     })->middleware('can:access-kasir');
// });

// Route::middleware(['auth'])->group(function () {
//     Route::get('/test/administrator', function () {
//         return view('test_middleware');
//     })->middleware('can:access-administrator');
// });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);