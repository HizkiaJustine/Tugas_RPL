<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return view('add_account', compact('title', 'name'));
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

        return redirect()->route('info_accounts')->with('success', 'Account created successfully.');
    }

    public function edit($id)
    {
        $account = Account::findOrFail($id);
        $title = "Edit Akun";
        $name = "Edit Akun";
        return view('edit_account', compact('account', 'title', 'name'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'email' => 'required|string|email|unique:account,email,' . $id . ',AccountID',
        'Role' => 'required|in:administrator,dokter,pasien,kasir',
    ]);

    $account = Account::findOrFail($id);
    $account->email = $request->email;
    $account->Role = $request->Role;

    if ($request->filled('password')) {
        $account->password = Hash::make($request->password);
    }

    $account->save();

    return redirect()->route('info_accounts')->with('success', 'Account updated successfully.');
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

        return redirect()->route('info_accounts')->with('success', 'Account deleted successfully.');
    }
}
