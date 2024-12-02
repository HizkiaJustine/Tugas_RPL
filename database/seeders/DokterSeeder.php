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
        $this->call(LayananSeeder::class);

        // Buat akun dokter
        $account1 = Account::create([
            'email' => 'dokter1@example.com',
            'password' => Hash::make('123'),
            'Role' => 'Dokter',
        ]);

        $account2 = Account::create([
            'email' => 'dokter2@example.com',
            'password' => Hash::make('123'),
            'Role' => 'Dokter',
        ]);

        $account3 = Account::create([
            'email' => 'dokter3@example.com',
            'password' => Hash::make('123'),
            'Role' => 'Dokter',
        ]);

        $account4 = Account::create([
            'email' => 'dokter4@example.com',
            'password' => Hash::make('123'),
            'Role' => 'Dokter',
        ]);

        $account5 = Account::create([
            'email' => 'dokter5@example.com',
            'password' => Hash::make('123'),
            'Role' => 'Dokter',
        ]);

        // Ambil LayananID dari layanan yang sudah ada
        $layanan1 = Layanan::where('NamaLayanan', 'Layanan Obgyn')->first();
        $layanan2 = Layanan::where('NamaLayanan', 'Layanan Obgyn')->first();
        $layanan3 = Layanan::where('NamaLayanan', 'Layanan Obgyn')->first();
        $layanan4 = Layanan::where('NamaLayanan', 'Layanan Obgyn')->first();
        $layanan5 = Layanan::where('NamaLayanan', 'Layanan Obgyn')->first();

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
