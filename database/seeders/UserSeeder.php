<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin Lab',
            'email' => 'admin@lab.com', // Tetap diisi untuk default bawaan Laravel
            'password' => Hash::make('password123'),
        ]);
    }
}