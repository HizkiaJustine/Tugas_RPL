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
        $account3 = Account::where('Role', 'karyawan')->skip(2)->first();
        $account4 = Account::where('Role', 'karyawan')->skip(3)->first();
        $account5 = Account::where('Role', 'karyawan')->skip(4)->first();

        // Buat karyawan
        Karyawan::create([
            'NamaKaryawan' => 'Jane Doe',
            'Jabatan' => 'Manager',
            'AlamatKaryawan' => '456 Elm St',
            'NomorHP' => '08123456780',
            'JenisKelamin' => 'P',
            'AccountID' => $account1->AccountID,
        ]);

        Karyawan::create([
            'NamaKaryawan' => 'John Smith',
            'Jabatan' => 'Staff',
            'AlamatKaryawan' => '789 Oak St',
            'NomorHP' => '08123456781',
            'JenisKelamin' => 'L',
            'AccountID' => $account2->AccountID,
        ]);

        Karyawan::create([
            'NamaKaryawan' => 'Alice Johnson',
            'Jabatan' => 'HR',
            'AlamatKaryawan' => '123 Pine St',
            'NomorHP' => '08123456782',
            'JenisKelamin' => 'P',
            'AccountID' => $account3->AccountID,
        ]);

        Karyawan::create([
            'NamaKaryawan' => 'Bob Brown',
            'Jabatan' => 'IT Support',
            'AlamatKaryawan' => '321 Maple St',
            'NomorHP' => '08123456783',
            'JenisKelamin' => 'L',
            'AccountID' => $account4->AccountID,
        ]);

        Karyawan::create([
            'NamaKaryawan' => 'Emma Wilson',
            'Jabatan' => 'Finance',
            'AlamatKaryawan' => '654 Cedar St',
            'NomorHP' => '08123456784',
            'JenisKelamin' => 'P',
            'AccountID' => $account5->AccountID,
        ]);
    }
}
