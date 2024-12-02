<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\DB;
use App\Models\Pasien;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('register'); // Ensure this matches the existing view file
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'umur' => 'required|integer',
            'berat_badan' => 'required|integer',
            'tinggi_badan' => 'required|integer',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'email' => 'required|email|unique:account,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Generate the AccountID manually
        $maxId = DB::table('account')->max(DB::raw('CAST(SUBSTRING(AccountID, 3) AS UNSIGNED)'));
        $newId = 'AC' . ($maxId + 1);

        $account = new Account();
        $account->AccountID = $newId;
        $account->email = $validatedData['email'];
        $account->password = bcrypt($validatedData['password']);
        $account->role = 'pasien'; // Set default role as Pasien
        $account->save();

        // Create a new Pasien record
        $pasien = new Pasien();
        $pasien->PasienID = 'P' . ($maxId + 1); // Generate PasienID
        $pasien->AccountID = $newId;
        $pasien->NamaPasien = $validatedData['name'];
        $pasien->AlamatPasien = $validatedData['address'];
        $pasien->NomorHP = $validatedData['phone'];
        $pasien->UmurPasien = $validatedData['umur'];
        $pasien->BeratBadanPasien = $validatedData['berat_badan'];
        $pasien->TinggiBadanPasien = $validatedData['tinggi_badan'];
        $pasien->TanggalLahirPasien = $validatedData['tanggal_lahir'];
        $pasien->JenisKelamin = $validatedData['jenis_kelamin'];
        $pasien->save();

        return redirect('/login')->with('success', 'Registration successful. Please login.');
    }
}