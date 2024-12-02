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

Route::middleware(['auth'])->group(function () {
    Route::get('/pasien', [PasienController::class, 'index'])->name('info_pasien')->middleware('can:access-pasien');
    Route::get('/edit_pasien/{id}', [PasienController::class, 'edit'])->name('edit_pasien')->middleware('can:access-pasien');
    Route::delete('/delete_pasien/{id}', [PasienController::class, 'destroy'])->name('delete_pasien')->middleware('can:access-pasien');
    Route::put('/update_pasien/{id}', [PasienController::class, 'update'])->name('update_pasien')->middleware('can:access-pasien');
    Route::get('/pasien/create', [PasienController::class, 'create'])->name('create_pasien')->middleware('can:access-pasien');
    Route::post('/pasien', [PasienController::class, 'store'])->name('store_pasien')->middleware('can:access-pasien');
    Route::get('/rekammedis/{id}', [RekamMedisController::class, 'show'])->name('rekammedis')->middleware('can:access-pasien');
});




Route::middleware(['auth'])->group(function () {
    Route::get('/test', function () {
        $user = Auth::user();
        $role = \App\Models\Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'pasien' or $role === 'administrator') {
            return view('test_middleware', ['user' => $user, 'role' => $role]);
        } else {
            abort(403, 'Unauthorized action.');
        }
    });
    Route::get('/test/pasien', function () {
        $user = Auth::user();
        $role = \App\Models\Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'pasien') {
            return view('test_middleware', ['user' => $user, 'role' => $role]);
        } else {
            abort(403, 'Unauthorized action.');
        }
    });
    Route::post('/resepobat', [ResepObatController::class, 'store'])->name('store_resepobat');
    Route::get('/resepobat/create', [ResepObatController::class, 'create'])->name('create_resepobat');
    Route::post('/resepobat', [ResepObatController::class, 'store'])->name('info_resepobat');
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