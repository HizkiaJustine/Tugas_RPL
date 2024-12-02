<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

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
            'email' => 'required|email|unique:account,email',
            'password' => 'required|min:6',
        ]);

        // Generate the AccountID manually
        $maxId = DB::table('account')->max(DB::raw('CAST(SUBSTRING(AccountID, 3) AS UNSIGNED)'));
        $newId = 'AC' . ($maxId + 1);

        $account = new Account();
        $account->AccountID = $newId;
        $account->email = $validatedData['email'];
        $account->password = bcrypt($validatedData['password']);
        $account->role = 'Pasien'; // Set default role as Pasien
        $account->save();

        // success redirect to login
        // return response()->json(['message' => 'Account created successfully'], 201);
        return redirect('/login');
    }
}