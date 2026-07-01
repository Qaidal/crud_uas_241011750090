<?php

use App\Http\Controllers\PeralatanLabController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// ==========================================
// 1. RUTE PUBLIK (Tanpa Login)
// ==========================================
Route::get('/', function () { return view('home'); })->name('public.home');
Route::view('/about', 'about')->name('public.about');
Route::view('/contact', 'contact')->name('public.contact');
Route::get('/data-lab', [PeralatanLabController::class, 'publicIndex'])->name('public.index');

// ==========================================
// 2. RUTE AUTENTIKASI
// ==========================================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// 3. RUTE BACKEND ADMIN (Wajib Login)
// ==========================================
Route::middleware('auth')->prefix('admin')->group(function () {
    // Gerbang utama selamat datang (URL menjadi: namadomain.com/admin)
    Route::get('/', [PeralatanLabController::class, 'index'])->name('admin.index');
    
    // Dashboard Katalog Data Lab (URL menjadi: namadomain.com/admin/dashboard)
    Route::get('/dashboard', [PeralatanLabController::class, 'dashboard'])->name('admin.dashboard');
    
    // Rute CRUD Aset Operasional Lab
    Route::get('/create', [PeralatanLabController::class, 'create'])->name('admin.create');
    Route::post('/store', [PeralatanLabController::class, 'store'])->name('admin.store');
    Route::get('/edit/{id}', [PeralatanLabController::class, 'edit'])->name('admin.edit');
    Route::put('/update/{id}', [PeralatanLabController::class, 'update'])->name('admin.update');
    Route::delete('/delete/{id}', [PeralatanLabController::class, 'destroy'])->name('admin.delete');
    Route::get('/export-pdf', [PeralatanLabController::class, 'exportPdf'])->name('admin.pdf');
});

// ==========================================
// 4. TOMBOL SEEDER OTOMATIS (Bisa Dihapus Nanti)
// ==========================================
// Panggil route ini sekali saja di browser setelah deploy ke Vercel berhasil
Route::get('/migrasi-db-online', function() {
    try {
        Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]);
        return "⚡ Selamat! Database Clever Cloud Anda sukses di-migrate dan di-seed dengan data asli.";
    } catch (\Exception $e) {
        return "❌ Gagal migrasi: " . $e->getMessage();
    }
});