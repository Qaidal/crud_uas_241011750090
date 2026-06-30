<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat akun admin tiruan untuk login UAS
        User::updateOrCreate(
            ['email' => 'admin@lab.com'],
            [
                'name' => 'Administrator Lab',
                'password' => Hash::make('password123'),
            ]
        );
    }
}