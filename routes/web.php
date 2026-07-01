<?php

use App\Http\Controllers\PeralatanLabController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// 1. RUTE PUBLIK (Tanpa Login)
Route::get('/', function () { return view('home'); })->name('public.home');
Route::view('/about', 'about')->name('public.about');
Route::view('/contact', 'contact')->name('public.contact');
Route::get('/data-lab', [PeralatanLabController::class, 'publicIndex'])->name('public.index');

// 2. RUTE AUTENTIKASI
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 3. RUTE BACKEND ADMIN (Wajib Login)
Route::middleware('auth')->prefix('admin')->group(function () {
    // Berubah ke URL '/admin' untuk gerbang utama selamat datang (Fungsi: index)
    Route::get('/admin', [PeralatanLabController::class, 'index'])->name('admin.index');
    
    // Rute baru untuk Dashboard Katalog Data Lab (Fungsi: dashboard)
    Route::get('/dashboard', [PeralatanLabController::class, 'dashboard'])->name('admin.dashboard');
    
    // Rute CRUD Aset Operasional Lab
    Route::get('/create', [PeralatanLabController::class, 'create'])->name('admin.create');
    Route::post('/store', [PeralatanLabController::class, 'store'])->name('admin.store');
    Route::get('/edit/{id}', [PeralatanLabController::class, 'edit'])->name('admin.edit');
    Route::put('/update/{id}', [PeralatanLabController::class, 'update'])->name('admin.update');
    Route::delete('/delete/{id}', [PeralatanLabController::class, 'destroy'])->name('admin.delete');
    Route::get('/export-pdf', [PeralatanLabController::class, 'exportPdf'])->name('admin.pdf');
});