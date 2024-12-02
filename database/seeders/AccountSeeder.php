<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Account::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'Role' => 'administrator',
        ]);

        Account::create([
            'email' => 'pasien1@example.com',
            'password' => Hash::make('password'),
            'Role' => 'pasien',
        ]);

        Account::create([
            'email' => 'pasien2@example.com',
            'password' => Hash::make('password'),
            'Role' => 'pasien',
        ]);

        Account::create([
            'email' => 'pasien3@example.com',
            'password' => Hash::make('password'),
            'Role' => 'pasien',
        ]);

        Account::create([
            'email' => 'dokter1@example.com',
            'password' => Hash::make('password'),
            'Role' => 'dokter',
        ]);

        Account::create([
            'email' => 'dokter2@example.com',
            'password' => Hash::make('password'),
            'Role' => 'dokter',
        ]);

        Account::create([
            'email' => 'dokter3@example.com',
            'password' => Hash::make('password'),
            'Role' => 'dokter',
        ]);

        Account::create([
            'email' => 'dokter4@example.com',
            'password' => Hash::make('password'),
            'Role' => 'dokter',
        ]);

        Account::create([
            'email' => 'dokter5@example.com',
            'password' => Hash::make('password'),
            'Role' => 'dokter',
        ]);

    }
}
