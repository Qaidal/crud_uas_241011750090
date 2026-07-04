<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HewanPeliharaan extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika diperlukan (jamak standar Laravel atau sesuai migrasi Anda)
    protected $table = 'hewan_peliharaans'; 

    // KUNCI PERBAIKAN: Mengikuti format id_alat sebelumnya, primary key disesuaikan menjadi id_hewan
    protected $primaryKey = 'id_hewan';

    protected $fillable = [
        'nama_hewan',
        'jenis',
        'usia',
        'pemilik',
        'ras_spesies',
        'gambar'
    ];
}