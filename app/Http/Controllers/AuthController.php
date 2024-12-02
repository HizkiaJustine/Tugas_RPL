<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Revert back to User model
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Account::create([ // Changed from User to Account
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'Role' => 'Pasien', // Assuming a default role
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
}
