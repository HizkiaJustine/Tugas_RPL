<?php
use \App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ResepObatController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\AppointmentController;


Route::get('/', function () {
    return view('index_user');
});

Route::get('/about', function () {
    return view('about');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pasien', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(PasienController::class)->index();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('info_pasien');

    Route::get('/edit_pasien/{id}', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(PasienController::class)->edit($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('edit_pasien');

    Route::delete('/delete_pasien/{id}', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(PasienController::class)->destroy($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('delete_pasien');

    Route::put('/update_pasien/{id}', function (Request $request, $id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(PasienController::class)->update($request, $id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('update_pasien');

    Route::get('/pasien/create', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(PasienController::class)->create();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('create_pasien');

    Route::post('/pasien', function (Request $request) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(PasienController::class)->store($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('store_pasien');

    Route::get('/rekammedis/{id}', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
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
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'pasien' or $role === 'administrator') {
            return view('test_middleware', ['user' => $user, 'role' => $role]);
        } else {
            abort(403, 'Unauthorized action.');
        }
    });
    Route::get('/test/pasien', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
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

Route::middleware(['auth'])->group(function () {
    Route::get('/obat', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(ObatController::class)->index();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('info_obat');

    Route::get('/edit_obat/{id}', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(ObatController::class)->edit($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('edit_obat');

    Route::delete('/delete_obat/{id}', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(ObatController::class)->destroy($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('delete_obat');

    Route::put('/update_obat/{id}', function (Request $request, $id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(ObatController::class)->update($request, $id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('update_obat');

    Route::get('/obat/create', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(ObatController::class)->create();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('create_obat');

    Route::post('/obat/store', function (Request $request) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(ObatController::class)->store($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('store_obat');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/resepobat', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(ResepObatController::class)->index();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('info_resepobat');

    Route::get('/edit_resepobat/{id}', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(ResepObatController::class)->edit($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('edit_resepobat');

    Route::delete('/delete_resepobat/{id}', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(ResepObatController::class)->destroy($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('delete_resepobat');

    Route::put('/update_resepobat/{id}', function (Request $request, $id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(ResepObatController::class)->update($request, $id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('update_resepobat');

    Route::get('/resepobat/create', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(ResepObatController::class)->create();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('create_resepobat');

    Route::post('/resepobat/store', function (Request $request) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(ResepObatController::class)->store($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('store_resepobat');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dokter', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(DokterController::class)->index();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('info_dokter');

    Route::get('/edit_dokter/{id}', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(DokterController::class)->edit($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('edit_dokter');

    Route::delete('/delete_dokter/{id}', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(DokterController::class)->destroy($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('delete_dokter');

    Route::put('/update_dokter/{id}', function (Request $request, $id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(DokterController::class)->update($request, $id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('update_dokter');

    Route::get('/dokter/create', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(DokterController::class)->create();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('create_dokter');

    Route::post('/dokter/store', function (Request $request) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(DokterController::class)->store($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('store_dokter');
});


Route::get('/layanan', [LayananController::class, 'index'])->name('info_layanan');
Route::get('/edit_layanan/{id}', [LayananController::class, 'edit'])->name('edit_layanan');
Route::delete('/delete_layanan/{id}', [LayananController::class, 'destroy'])->name('delete_layanan');
Route::put('/update_layanan/{id}', [LayananController::class, 'update'])->name('update_layanan');
Route::get('/layanan/create', [LayananController::class, 'create'])->name('create_layanan');
Route::post('/layanan/store', [LayananController::class, 'store'])->name('store_layanan');

Route::middleware(['auth'])->group(function () {
    Route::get('/karyawan', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(KaryawanController::class)->index();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('info_karyawan');

    Route::get('/edit_karyawan/{id}', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(KaryawanController::class)->edit($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('edit_karyawan');

    Route::delete('/delete_karyawan/{id}', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(KaryawanController::class)->destroy($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('delete_karyawan');

    Route::put('/update_karyawan/{id}', function (Request $request, $id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(KaryawanController::class)->update($request, $id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('update_karyawan');

    Route::get('/karyawan/create', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(KaryawanController::class)->create();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('create_karyawan');

    Route::post('/karyawan/store', function (Request $request) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(KaryawanController::class)->store($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('store_karyawan');
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


Route::get('/appointment', [AppointmentController::class, 'create'])->name('appointment.create');
Route::post('/appointment/submitted', [AppointmentController::class, 'store'])->name('appointment.store');

Route::resource('suppliers', SupplierController::class);

Route::get('/cashier', [CashierController::class, 'index'])->name('cashier.index');
Route::get('/cashier/edit/{record}', [CashierController::class, 'edit'])->name('cashier.edit');
Route::post('/cashier/update/{record}', [CashierController::class, 'update'])->name('cashier.update');
Route::get('/cashier/delete/{record}', [CashierController::class, 'destroy'])->name('cashier.destroy');
Route::get('/cashier/create', [CashierController::class, 'create'])->name('cashier.create');
Route::post('/cashier/submitted', [CashierController::class, 'store'])->name('cashier.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/forum', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if (in_array($role, ['pasien', 'dokter', 'administrator', 'kasir'])) {
            return app(ForumController::class)->index();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('forum');

    Route::post('/forum/question', function (Request $request) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'pasien') {
            return app(ForumController::class)->storeQuestion($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('forum.storeQuestion');

    Route::post('/forum/answer/{id}', function (Request $request, $id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'dokter') {
            return app(ForumController::class)->storeAnswer($request, $id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('forum.storeAnswer');
});

Route::get('/forum', [ForumController::class, 'index'])->name('forum');


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');