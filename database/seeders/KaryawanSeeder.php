<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use App\Models\Account;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat akun karyawan
        $account1 = Account::where('Role', 'karyawan')->first();
        $account2 = Account::where('Role', 'karyawan')->skip(1)->first();

        // Buat karyawan
        Karyawan::create([
            'NamaKaryawan' => 'Jane Doe',
            'Jabatan' => 'Manager',
            'NomorHP' => '08123456780',
            'AlamatKaryawan' => '456 Elm St',
            'JenisKelamin' => 'P',
            'AccountID' => $account1->AccountID,
        ]);

        Karyawan::create([
            'NamaKaryawan' => 'John Smith',
            'Jabatan' => 'Staff',
            'NomorHP' => '08123456781',
            'AlamatKaryawan' => '789 Oak St',
            'JenisKelamin' => 'L',
            'AccountID' => $account2->AccountID,
        ]);
    }
}
