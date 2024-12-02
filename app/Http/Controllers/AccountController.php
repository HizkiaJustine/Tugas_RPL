<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();
        $title = "Data Akun";
        $name = "Informasi Akun";
        return view('info_account', compact('accounts', 'title', 'name'));
    }

    public function create()
    {
        $title = "Tambah Akun";
        $name = "Tambah Akun Baru";
        return view('create_account', compact('title', 'name'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'AccountID' => 'required|string|unique:account',
            'email' => 'required|string|email|unique:account',
            'password' => 'required|string|min:8',
            'Role' => 'required|in:administrator,dokter,pasien,kasir',
        ]);

        Account::create([
            'AccountID' => $request->AccountID,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'Role' => $request->Role,
        ]);

        return redirect()->route('accounts.index')->with('success', 'Account created successfully.');
    }

    public function edit($id)
    {
        $account = Account::findOrFail($id);
        return view('accounts.edit', compact('account'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|string|email|unique:account,email,' . $id . ',AccountID',
            'Role' => 'required|in:administrator,dokter,pasien,kasir',
        ]);

        $account = Account::findOrFail($id);
        $account->update([
            'email' => $request->email,
            'Role' => $request->Role,
            'password' => $request->password ? Hash::make($request->password) : $account->password,
        ]);

        return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');
    }

    public function show($id)
    {
        $account = Account::findOrFail($id);
        return view('accounts.show', compact('account'));
    }

    public function destroy($id)
    {
        $account = Account::findOrFail($id);
        $account->delete();

        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully.');
    }
}
