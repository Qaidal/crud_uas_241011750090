<?php

use App\Http\Controllers\HewanPeliharaanController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// ==========================================
// 1. RUTE PUBLIK (Tanpa Login)
// ==========================================
Route::get('/', function () { return view('home'); })->name('public.home');
Route::view('/about', 'about')->name('public.about');
Route::view('/contact', 'contact')->name('public.contact');
Route::get('/data-hewan', [HewanPeliharaanController::class, 'publicIndex'])->name('public.index');

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
    Route::get('/', [HewanPeliharaanController::class, 'index'])->name('admin.index');
    
    // Dashboard Katalog Data Hewan (URL menjadi: namadomain.com/admin/dashboard)
    Route::get('/dashboard', [HewanPeliharaanController::class, 'dashboard'])->name('admin.dashboard');
    
    // Rute CRUD Manajemen Data Hewan Peliharaan
    Route::get('/create', [HewanPeliharaanController::class, 'create'])->name('admin.create');
    Route::post('/store', [HewanPeliharaanController::class, 'store'])->name('admin.store');
    
    // MENYESUAIKAN: Mengubah parameter {id} menjadi {id_hewan} agar sinkron dengan primary key kustom
    Route::get('/edit/{id_hewan}', [HewanPeliharaanController::class, 'edit'])->name('admin.edit');
    Route::put('/update/{id_hewan}', [HewanPeliharaanController::class, 'update'])->name('admin.update');
    Route::delete('/delete/{id_hewan}', [HewanPeliharaanController::class, 'destroy'])->name('admin.delete');
    
    Route::get('/export-pdf', [HewanPeliharaanController::class, 'exportPdf'])->name('admin.pdf');
});

// ==========================================
// 4. TOMBOL SEEDER OTOMATIS
// ==========================================
Route::get('/migrasi-db-online', function() {
    try {
        Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]);
        return "⚡ Selamat! Database Clever Cloud Anda sukses di-migrate dan di-seed dengan data hewan peliharaan.";
    } catch (\Exception $e) {
        return "❌ Gagal migrasi: " . $e->getMessage();
    }
});