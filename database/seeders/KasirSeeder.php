<?php

namespace Database\Seeders;

use App\Models\Kasir;
use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KasirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat akun kasir
        $account = Account::create([
            'email' => 'kasir1@example.com',
            'password' => Hash::make('password'), // Password diatur sebagai "123"
            'Role' => 'Kasir',
        ]);

        // Buat kasir
        Kasir::create([
            'NamaKasir' => 'John Smith',
            'NomorHP' => '08123456789',
            'AlamatKasir' => '789 Market St',
            'JenisKelamin' => 'L',
            'AccountID' => $account->AccountID,
        ]);
    }
}
