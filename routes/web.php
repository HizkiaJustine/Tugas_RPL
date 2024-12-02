<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\LayananController;
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
    Route::get('/pasien', function () {
        $user = Auth::user();
        $role = \App\Models\Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(PasienController::class)->index();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('info_pasien');

    Route::get('/edit_pasien/{id}', function ($id) {
        $user = Auth::user();
        $role = \App\Models\Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(PasienController::class)->edit($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('edit_pasien');

    Route::delete('/delete_pasien/{id}', function ($id) {
        $user = Auth::user();
        $role = \App\Models\Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(PasienController::class)->destroy($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('delete_pasien');

    Route::put('/update_pasien/{id}', function ($id) {
        $user = Auth::user();
        $role = \App\Models\Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(PasienController::class)->update($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('update_pasien');

    Route::get('/pasien/create', function () {
        $user = Auth::user();
        $role = \App\Models\Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(PasienController::class)->create();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('create_pasien');

    Route::post('/pasien', function () {
        $user = Auth::user();
        $role = \App\Models\Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(PasienController::class)->store();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('store_pasien');

    Route::get('/rekammedis/{id}', function ($id) {
        $user = Auth::user();
        $role = \App\Models\Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(RekamMedisController::class)->show($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('rekammedis');
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

Route::get('/obat', [ObatController::class, 'index'])->name('info_obat');
Route::get('/edit_obat/{id}', [ObatController::class, 'edit'])->name('edit_obat');
Route::delete('/delete_obat/{id}', [ObatController::class, 'destroy'])->name('delete_obat');
Route::put('/update_obat/{id}', [ObatController::class, 'update'])->name('update_obat');
Route::get('/obat/create', [ObatController::class, 'create'])->name('create_obat');
Route::post('/obat/store', [ObatController::class, 'store'])->name('store_obat');

Route::get('/layanan', [LayananController::class, 'index'])->name('info_layanan');
Route::get('/edit_layanan/{id}', [LayananController::class, 'edit'])->name('edit_layanan');
Route::delete('/delete_layanan/{id}', [LayananController::class, 'destroy'])->name('delete_layanan');
Route::put('/update_layanan/{id}', [LayananController::class, 'update'])->name('update_layanan');
Route::get('/layanan/create', [LayananController::class, 'create'])->name('create_layanan');
Route::post('/layanan/store', [LayananController::class, 'store'])->name('store_layanan');
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