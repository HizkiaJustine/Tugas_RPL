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
            'Departemen' => 'Obgyn',
            'AlamatDokter' => '123 Main St',
            'NomorHP' => '08123456789',
            'FotoDokter' => 'path/to/photo.jpg',
            'LayananID' => $layanan1->LayananID,
            'AccountID' => $account1->AccountID,
        ]);

        Dokter::create([
            'NamaDokter' => 'Dr. John Dae',
            'Departemen' => 'Obgyn',
            'AlamatDokter' => '123 Main St',
            'NomorHP' => '08123456789',
            'FotoDokter' => 'path/to/photo.jpg',
            'LayananID' => $layanan2->LayananID,
            'AccountID' => $account2->AccountID,
        ]);

        Dokter::create([
            'NamaDokter' => 'Dr. John Due',
            'Departemen' => 'Obgyn',
            'AlamatDokter' => '123 Main St',
            'NomorHP' => '08123456789',
            'FotoDokter' => 'path/to/photo.jpg',
            'LayananID' => $layanan3->LayananID,
            'AccountID' => $account3->AccountID,
        ]);

        Dokter::create([
            'NamaDokter' => 'Dr. John Die',
            'Departemen' => 'Obgyn',
            'AlamatDokter' => '123 Main St',
            'NomorHP' => '08123456789',
            'FotoDokter' => 'path/to/photo.jpg',
            'LayananID' => $layanan4->LayananID,
            'AccountID' => $account4->AccountID,
        ]);

        Dokter::create([
            'NamaDokter' => 'Dr. John Dee',
            'Departemen' => 'Obgyn',
            'AlamatDokter' => '123 Main St',
            'NomorHP' => '08123456789',
            'FotoDokter' => 'path/to/photo.jpg',
            'LayananID' => $layanan5->LayananID,
            'AccountID' => $account5->AccountID,
        ]);
    }
}
