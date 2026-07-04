<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menggunakan updateOrCreate agar terhindar dari error duplicate entry jika di-seed ulang
        User::updateOrCreate(
            ['email' => 'admin@petcare.com'],
            [
                'name' => 'Admin Pet Care',
                'password' => Hash::make('password'), // Tetap menggunakan password default untuk login
            ]
        );
    }
}