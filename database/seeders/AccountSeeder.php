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
            'Role' => 'Administrator',
        ]);

        Account::create([
            'email' => 'pasien1@example.com',
            'password' => Hash::make('password'),
            'Role' => 'Pasien',
        ]);

    }
}
