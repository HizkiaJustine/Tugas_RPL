<?php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\Account;
use App\Models\Layanan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Buat akun dokter
        $account1 = Account::where('Role', 'dokter')->first();

        $account2 = Account::where('Role', 'dokter')->skip(1)->first();

        $account3 = Account::where('Role', 'dokter')->skip(2)->first();

        $account4 = Account::where('Role', 'dokter')->skip(3)->first();

        $account5 = Account::where('Role', 'dokter')->skip(4)->first();

        // Mendapatkan data pertama
        $layanan1 = Layanan::skip(0)->first();

        // Mendapatkan data kedua
        $layanan2 = Layanan::skip(1)->first();

        // Mendapatkan data ketiga
        $layanan3 = Layanan::skip(2)->first();

        // Mendapatkan data keempat
        $layanan4 = Layanan::skip(3)->first();

        // Mendapatkan data kelima
        $layanan5 = Layanan::skip(4)->first();

        // Buat dokter
        Dokter::create([
            'NamaDokter' => 'Dr. John Doe',
            'Departemen' => $layanan1->NamaLayanan,
            'AlamatDokter' => '123 Main St',
            'NomorHP' => '08123456789',
            'LayananID' => $layanan1->LayananID,
            'AccountID' => $account1->AccountID,
        ]);

        Dokter::create([
            'NamaDokter' => 'Dr. John Dae',
            'Departemen' => $layanan2->NamaLayanan,
            'AlamatDokter' => '123 Main St',
            'NomorHP' => '08123456789',
            'LayananID' => $layanan2->LayananID,
            'AccountID' => $account2->AccountID,
        ]);

        Dokter::create([
            'NamaDokter' => 'Dr. John Due',
            'Departemen' => $layanan3->NamaLayanan,
            'AlamatDokter' => '123 Main St',
            'NomorHP' => '08123456789',
            'LayananID' => $layanan3->LayananID,
            'AccountID' => $account3->AccountID,
        ]);

        Dokter::create([
            'NamaDokter' => 'Dr. John Die',
            'Departemen' => $layanan4->NamaLayanan,
            'AlamatDokter' => '123 Main St',
            'NomorHP' => '08123456789',
            'LayananID' => $layanan4->LayananID,
            'AccountID' => $account4->AccountID,
        ]);

        Dokter::create([
            'NamaDokter' => 'Dr. John Dee',
            'Departemen' => $layanan5->NamaLayanan,
            'AlamatDokter' => '123 Main St',
            'NomorHP' => '08123456789',
            'LayananID' => $layanan5->LayananID,
            'AccountID' => $account5->AccountID,
        ]);
    }
}
