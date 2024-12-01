<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:account,email',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return redirect('/register')
                        ->withErrors($validator)
                        ->withInput();
        }

        $account = new Account();
        $account->email = $request->email;
        $account->password = Hash::make($request->password);
        $account->role = 'Pasien'; // Default role

        if ($account->save()) {
            return redirect('/login')->with('success', 'Registration successful. Please login.');
        } else {
            return redirect('/register')->with('error', 'Registration failed. Please try again.');
        }
    }
}