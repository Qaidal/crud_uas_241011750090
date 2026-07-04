<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\HewanPeliharaan; // Pastikan model ini sudah dibuat
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun Admin Default
        User::updateOrCreate(
            ['email' => 'admin@petcare.com'],
            [
                'name' => 'Admin Pet Care',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Buat Data Hewan Peliharaan ke Database
        $dataHewan = [
            [
                'nama_hewan' => 'Milo',
                'jenis' => 'Kucing',
                'usia' => 2,
                'pemilik' => 'Andi Wijaya',
                'ras_spesies' => 'Persia',
                'gambar' => 'milo.jpg'
            ],
            [
                'nama_hewan' => 'Rocky',
                'jenis' => 'Anjing',
                'usia' => 3,
                'pemilik' => 'Budi Santoso',
                'ras_spesies' => 'Golden Retriever',
                'gambar' => 'rocky.jpg'
            ],
            [
                'nama_hewan' => 'Snowy',
                'jenis' => 'Kelinci',
                'usia' => 1,
                'pemilik' => 'Citra Lestari',
                'ras_spesies' => 'Anggora',
                'gambar' => 'snowy.jpg'
            ],
            [
                'nama_hewan' => 'Bubbles',
                'jenis' => 'Ikan',
                'usia' => 1,
                'pemilik' => 'Dedi Kurniawan',
                'ras_spesies' => 'Mas Koki',
                'gambar' => 'bubbles.jpg'
            ],
            [
                'nama_hewan' => 'Chirpy',
                'jenis' => 'Burung',
                'usia' => 2,
                'pemilik' => 'Eka Putri',
                'ras_spesies' => 'Lovebird',
                'gambar' => 'chirpy.jpg'
            ],
        ];

        foreach ($dataHewan as $hewan) {
            // Menggunakan updateOrCreate agar data tidak duplikat saat seeder dijalankan ulang
            HewanPeliharaan::updateOrCreate(
                ['nama_hewan' => $hewan['nama_hewan']],
                [
                    'jenis' => $hewan['jenis'],
                    'usia' => $hewan['usia'],
                    'pemilik' => $hewan['pemilik'],
                    'ras_spesies' => $hewan['ras_spesies'],
                    'gambar' => $hewan['gambar'],
                ]
            );
        }
    }
}