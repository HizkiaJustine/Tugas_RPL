<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\Pasien;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $account = Account::where('email', $user->email)->first();
        $pasien = Pasien::where('AccountID', $account->AccountID)->first();

        return view('profile.show', compact('account', 'pasien'));
    }

    public function edit()
    {
        $user = Auth::user();
        $account = Account::where('email', $user->email)->first();
        $pasien = Pasien::where('AccountID', $account->AccountID)->first();

        return view('profile.edit', compact('account', 'pasien'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $account = Account::where('email', $user->email)->first();
        $pasien = Pasien::where('AccountID', $account->AccountID)->first();

        $pasien->update($request->all());

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
    }
}
