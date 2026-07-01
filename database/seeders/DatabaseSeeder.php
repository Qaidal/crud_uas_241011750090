<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\PeralatanLab; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun Admin Default
        User::updateOrCreate(
            ['email' => 'admin@lab.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Buat Data Peralatan Lab Asli ke Database
        $dataPeralatan = [
            [
                'nama_alat' => 'PC Gaming i7 Workstation',
                'jenis' => 'Komputer Client',
                'kondisi' => 'Baik',
                'lokasi' => 'Lab Multimedia - Meja 04',
                'gambar' => 'pc.jpg'
            ],
            [
                'nama_alat' => 'MikroTik Cloud Router 1036',
                'jenis' => 'Perangkat Jaringan',
                'kondisi' => 'Baik',
                'lokasi' => 'Ruang Server Pusat',
                'gambar' => 'mikrotik.jpg'
            ],
            [
                'nama_alat' => 'Projector Epson EB-X400',
                'jenis' => 'Multimedia Display',
                'kondisi' => 'Rusak Ringan',
                'lokasi' => 'Gudang Inventaris B',
                'gambar' => 'epson.jpg'
            ],
            [
                'nama_alat' => 'Arduino Uno R3 Starter Kit',
                'jenis' => 'Modul Mikrokontroler',
                'kondisi' => 'Baik',
                'lokasi' => 'Lemari Lab IoT A-2',
                'gambar' => 'arduino.jpg'
            ],
            [
                'nama_alat' => 'Server Dell PowerEdge T440',
                'jenis' => 'Infrastruktur Server',
                'kondisi' => 'Baik',
                'lokasi' => 'Ruang Rack Server 01',
                'gambar' => 'serverdell.jpg'
            ],
            [
                'nama_alat' => 'Logitech HD Webcam C922 Pro',
                'jenis' => 'Aksesoris Komputer',
                'kondisi' => 'Baik',
                'lokasi' => 'Meja Instruktur Lab 1',
                'gambar' => 'logitech.jpg'
            ],
            [
                'nama_alat' => 'Cisco Switch Catalyst 2960',
                'jenis' => 'Perangkat Jaringan',
                'kondisi' => 'Baik',
                'lokasi' => 'Lab Jaringan - Rack B',
                'gambar' => 'cisco.jpg'
            ],
            [
                'nama_alat' => 'Raspberry Pi 4 Model B (8GB)',
                'jenis' => 'Mini PC / Modul IoT',
                'kondisi' => 'Rusak Ringan',
                'lokasi' => 'Lemari Lab IoT A-3',
                'gambar' => 'raspberry.jpg'
            ],
        ];

        foreach ($dataPeralatan as $alat) {
            // UBAH JUGA DI SINI (Menggunakan PeralatanLab)
            PeralatanLab::updateOrCreate(
                ['nama_alat' => $alat['nama_alat']],
                [
                    'jenis' => $alat['jenis'],
                    'kondisi' => $alat['kondisi'],
                    'lokasi' => $alat['lokasi'],
                    'gambar' => $alat['gambar'],
                ]
            );
        }
    }
}