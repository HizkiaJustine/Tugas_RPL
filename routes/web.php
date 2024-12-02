<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResepObatController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\KaryawanController;


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

Route::middleware(['auth'])->group(function () {
    Route::get('/test', function () {
        return view('test_middleware');
    })->middleware('can:access-pasien');
});

Route::get('/pasien', [PasienController::class, 'index'])->name('info_pasien')->middleware('can:access-pasien');
Route::get('/edit_pasien/{id}', [PasienController::class, 'edit'])->name('edit_pasien')->middleware('can:access-pasien');
Route::delete('/delete_pasien/{id}', [PasienController::class, 'destroy'])->name('delete_pasien')->middleware('can:access-pasien');
Route::put('/update_pasien/{id}', [PasienController::class, 'update'])->name('update_pasien')->middleware('can:access-pasien');
Route::get('/pasien/create', [PasienController::class, 'create'])->name('create_pasien')->middleware('can:access-pasien');
Route::post('/pasien', [PasienController::class, 'store'])->name('store_pasien')->middleware('can:access-pasien');

Route::get('/dokter', [DokterController::class, 'index'])->name('info_dokter')->middleware('can:access-dokter'); 
Route::get('/edit_dokter/{id}', [DokterController::class, 'edit'])->name('edit_dokter')->middleware('can:access-dokter'); 
Route::delete('/delete_dokter/{id}', [DokterController::class, 'destroy'])->name('delete_dokter')->middleware('can:access-dokter'); 
Route::put('/update_dokter/{id}', [DokterController::class, 'update'])->name('update_dokter')->middleware('can:access-dokter'); 
Route::get('/dokter/create', [DokterController::class, 'create'])->name('create_dokter')->middleware('can:access-dokter'); 
Route::post('/dokter', [DokterController::class, 'store'])->name('store_dokter')->middleware('can:access-dokter');


Route::get('/karyawan', [KaryawanController::class, 'index'])->name('info_karyawan')->middleware('can:access-karyawan');
Route::get('/edit_karyawan/{id}', [KaryawanController::class, 'edit'])->name('edit_karyawan')->middleware('can:access-karyawan');
Route::delete('/delete_karyawan/{id}', [KaryawanController::class, 'destroy'])->name('delete_karyawan')->middleware('can:access-karyawan');
Route::put('/update_karyawan/{id}', [KaryawanController::class, 'update'])->name('update_karyawan')->middleware('can:access-karyawan');
Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('create_karyawan')->middleware('can:access-karyawan');
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('store_karyawan')->middleware('can:access-karyawan');


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