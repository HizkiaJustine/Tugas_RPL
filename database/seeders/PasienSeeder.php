<?php

namespace Database\Seeders;

use App\Models\Pasien;
use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat akun pasien
        $account1 = Account::create([
            'email' => 'pasien1@example.com',
            'password' => Hash::make('123'), // Password diatur sebagai "123"
            'Role' => 'Pasien',
        ]);

        $account2 = Account::create([
            'email' => 'pasien2@example.com',
            'password' => Hash::make('123'), // Password diatur sebagai "123"
            'Role' => 'Pasien',
        ]);

        $account3 = Account::create([
            'email' => 'pasien3@example.com',
            'password' => Hash::make('123'), // Password diatur sebagai "123"
            'Role' => 'Pasien',
        ]);

        // Buat pasien
        Pasien::create([
            'NamaPasien' => 'Jane Doe',
            'UmurPasien' => 30,
            'AlamatPasien' => '456 Another St',
            'BeratBadanPasien' => 65.5,
            'TinggiBadanPasien' => 165.0,
            'TanggalLahirPasien' => '1994-01-01',
            'JenisKelamin' => 'P',
            'NomorHP' => '08123456789',
            'AccountID' => $account1->AccountID,
        ]);

        Pasien::create([
            'NamaPasien' => 'Jane Due',
            'UmurPasien' => 30,
            'AlamatPasien' => '456 Another St',
            'BeratBadanPasien' => 65.5,
            'TinggiBadanPasien' => 165.0,
            'TanggalLahirPasien' => '1994-01-01',
            'JenisKelamin' => 'P',
            'NomorHP' => '08123456788',
            'AccountID' => $account2->AccountID,
        ]);

        Pasien::create([
            'NamaPasien' => 'Jane Dee',
            'UmurPasien' => 30,
            'AlamatPasien' => '456 Another St',
            'BeratBadanPasien' => 65.5,
            'TinggiBadanPasien' => 165.0,
            'TanggalLahirPasien' => '1994-01-01',
            'JenisKelamin' => 'P',
            'NomorHP' => '08123456799',
            'AccountID' => $account3->AccountID,
        ]);
    }
}
