<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeralatanLab extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika diperlukan
    protected $table = 'peralatan_labs'; 

    // KUNCI PERBAIKAN: Beritahu Laravel bahwa primary key-nya adalah id_alat, bukan id!
    protected $primaryKey = 'id_alat';

    protected $fillable = [
        'nama_alat',
        'jenis',
        'kondisi',
        'lokasi',
        'gambar'
    ];
}