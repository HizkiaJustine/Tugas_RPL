<?php
use \App\Models\Account;
use \App\Models\Pasien; // Add this line
use \App\Models\Article; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ResepObatController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;

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
});

Route::middleware(['auth'])->group(function () {
    Route::get('/obat', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator' or $role === 'dokter' or $role === 'kasir') {
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


Route::middleware(['auth'])->group(function () {
    Route::get('/layanan', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(LayananController::class)->index();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('info_layanan');

    Route::get('/edit_layanan/{id}', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(LayananController::class)->edit($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('edit_layanan');

    Route::delete('/delete_layanan/{id}', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(LayananController::class)->destroy($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('delete_layanan');

    Route::put('/update_layanan/{id}', function (Request $request, $id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(LayananController::class)->update($request, $id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('update_layanan');

    Route::get('/layanan/create', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(LayananController::class)->create();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('create_layanan');

    Route::post('/layanan/store', function (Request $request) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(LayananController::class)->store($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('store_layanan');
});

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

    Route::get('/dokter/create', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(DokterController::class)->create();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('create_dokter');

    Route::post('/dokter', function (Request $request) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(DokterController::class)->store($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('store_dokter');

    Route::get('/dokter/{id}/edit', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(DokterController::class)->edit($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('edit_dokter');

    Route::put('/dokter/{id}', function (Request $request, $id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(DokterController::class)->update($request, $id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('update_dokter');

    Route::delete('/dokter/{id}', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(DokterController::class)->destroy($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('delete_dokter');
});




Route::middleware(['auth'])->group(function () {
    Route::get('/akun', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(AccountController::class)->index();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('info_accounts');

    Route::get('/edit_account/{id}', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(AccountController::class)->edit($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('edit_account');

    Route::delete('/delete_account/{id}', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(AccountController::class)->destroy($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('delete_account');

    Route::put('/update_account/{id}', function (Request $request, $id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(AccountController::class)->update($request, $id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('update_account');

    Route::get('/accounts/create', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(AccountController::class)->create();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('create_account');

    Route::post('/accounts/store', function (Request $request) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(AccountController::class)->store($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('store_account');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        $user = Auth::user();
        $account = Account::where('email', $user->email)->first();
        $pasien = Pasien::where('AccountID', $account->AccountID)->first();
        return view('profile.show', compact('account', 'pasien'));
    })->name('profile.show');

    Route::get('/profile/edit', function () {
        $user = Auth::user();
        $account = Account::where('email', $user->email)->first();
        $pasien = Pasien::where('AccountID', $account->AccountID)->first();
        return view('profile.edit', compact('account', 'pasien'));
    })->name('profile.edit');

    Route::put('/profile', function (Request $request) {
        $user = Auth::user();
        $account = Account::where('email', $user->email)->first();
        $pasien = Pasien::where('AccountID', $account->AccountID)->first();
        $pasien->update($request->all());
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
    })->name('profile.update');
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

Route::get('/cashier', [CashierController::class, 'index'])->name('cashier.index');
Route::get('/cashier/edit/{record}', [CashierController::class, 'edit'])->name('cashier.edit');
Route::post('/cashier/update/{record}', [CashierController::class, 'update'])->name('cashier.update');
Route::get('/cashier/delete/{record}', [CashierController::class, 'destroy'])->name('cashier.destroy');
Route::get('/cashier/create', [CashierController::class, 'create'])->name('cashier.create');
Route::post('/cashier/submitted', [CashierController::class, 'store'])->name('cashier.store');

Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::get('/payment/edit/{record}', [PaymentController::class, 'edit'])->name('payment.edit');
Route::post('/payment/update/{record}', [PaymentController::class, 'update'])->name('payment.update');
Route::get('/payment/delete/{record}', [PaymentController::class, 'destroy'])->name('payment.destroy');
Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
Route::post('/payment/submitted', [PaymentController::class, 'store'])->name('payment.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/payment/method', [PaymentController::class, 'showPaymentMethod'])->name('payment.method');
    Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
    Route::get('/payment/success', [PaymentController::class, 'showSuccess'])->name('payment.success');
});

Route::get('/purchase', [PurchaseController::class, 'index'])->name('purchase.index');
Route::get('/purchase/edit/{record}', [PurchaseController::class, 'edit'])->name('purchase.edit');
Route::post('/purchase/update/{record}', [PurchaseController::class, 'update'])->name('purchase.update');
Route::get('/purchase/delete/{record}', [PurchaseController::class, 'destroy'])->name('purchase.destroy');
Route::get('/purchase/create', [PurchaseController::class, 'create'])->name('purchase.create');
Route::post('purchase/submitted', [PurchaseController::class, 'store'])->name('purchase.store');

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

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

Route::get('/articles/{id}', function ($id) {
    $article = Article::findOrFail($id);
    return view('articles.show', compact('article'));
})->name('articles.show');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');



Route::get('/jantung', function () {
    return view('jantung', ['title' => 'Home Page / Layanan / Jantung', 'name' => 'Layanan Jantung']);
});

Route::get('/paru', function () {
    return view('paru', ['title' => 'Home Page / Layanan / Paru-paru', 'name' => 'Layanan Paru-paru']);
});

Route::get('/obgyn', function () {
    return view('obgyn', ['title' => 'Home Page / Layanan / Obgyn', 'name' => 'Layanan Obgyn']);
});

Route::get('/radiologi', function () {
    return view('radiologi', ['title' => 'Home Page / Layanan / Radiologi', 'name' => 'Layanan Radiologi']);
});

Route::get('/okupasi', function () {
    return view('okupasi', ['title' => 'Home Page / Layanan / Okupasi', 'name' => 'Layanan Okupasi']);
});

Route::get('/rehabilitasi-medik', function () {
    return view('rehabilitasi', ['title' => 'Home Page / Layanan / Rehabilitasi Medik', 'name' => 'Layanan Rehabilitasi Medik']);
});

Route::get('/laboratorium', function () {
    return view('laboratorium', ['title' => 'Home Page / Layanan / Laboratorium', 'name' => 'Layanan Laboratorium']);
});

Route::get('/gawat-darurat', function () {
    return view('darurat', ['title' => 'Home Page / Layanan / Gawat Darurat', 'name' => 'Layanan Gawat Darurat']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/rekam-medis', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator' or $role === 'dokter') {
            return app(RekamMedisController::class)->index();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('info_rekammedis');

    Route::get('/rekam-medis/create', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator' or $role === 'dokter') {
            return app(RekamMedisController::class)->create();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('create_rekammedis');

    Route::post('/rekam-medis', function (Request $request) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator' or $role === 'dokter') {
            return app(RekamMedisController::class)->store($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('store_rekammedis');

    Route::get('/rekam-medis/{id}/edit', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator' or $role === 'dokter') {
            return app(RekamMedisController::class)->edit($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('edit_rekammedis');

    Route::put('/rekam-medis/{id}', function (Request $request, $id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator' or $role === 'dokter') {
            return app(RekamMedisController::class)->update($request, $id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('update_rekammedis');

    Route::delete('/rekam-medis/{id}', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator' or $role === 'dokter') {
            return app(RekamMedisController::class)->destroy($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('delete_rekammedis');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/supplier', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(SupplierController::class)->index();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('info_supplier');

    Route::get('/supplier/create', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(SupplierController::class)->create();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('create_supplier');

    Route::post('/supplier', function (Request $request) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(SupplierController::class)->store($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('store_supplier');

    Route::get('/supplier/{id}/edit', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(SupplierController::class)->edit($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('edit_supplier');

    Route::put('/supplier/{id}', function (Request $request, $id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(SupplierController::class)->update($request, $id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('update_supplier');

    Route::delete('/supplier/{id}', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(SupplierController::class)->destroy($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('delete_supplier');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/article', function (Request $request) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(ArticleController::class)->adminIndex($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('admin.articles.index');

    Route::get('/admin/article/create', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(ArticleController::class)->create();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('admin.articles.create');

    Route::post('/admin/article', function (Request $request) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(ArticleController::class)->store($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('admin.articles.store');

    Route::get('/admin/article/{id}/edit', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(ArticleController::class)->edit($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('admin.articles.edit');

    Route::put('/admin/article/{id}', function (Request $request, $id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(ArticleController::class)->update($request, $id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('admin.articles.update');

    Route::delete('/admin/article/{id}', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(ArticleController::class)->destroy($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('admin.articles.destroy');
});

Route::get('/my-appointments', [AppointmentController::class, 'showAppointments'])->name('appointments.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/my_rekammedis', [RekamMedisController::class, 'showPatientRecords'])->name('rekammedis.show');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/appointments', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(AppointmentController::class)->index();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('info_appointment');

    Route::get('/appointments/create', function () {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(AppointmentController::class)->create();
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('create_appointment');

    Route::post('/appointments', function (Request $request) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(AppointmentController::class)->store($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('store_appointment');

    Route::get('/appointments/{id}/edit', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(AppointmentController::class)->edit($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('edit_appointment');

    Route::put('/appointments/{id}', function (Request $request, $id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(AppointmentController::class)->update($request, $id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('update_appointment');

    Route::delete('/appointments/{id}', function ($id) {
        $user = Auth::user();
        $role = Account::where('email', $user->email)->first()->Role ?? 'Role not set';
        if ($role === 'administrator') {
            return app(AppointmentController::class)->destroy($id);
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('delete_appointment');

    Route::put('/appointments/{id}/cancel', [AppointmentController::class, 'cancel'])->name('appointment.cancel');
});