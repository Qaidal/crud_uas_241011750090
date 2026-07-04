@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="bg-white text-dark py-5 border-bottom border-light">
    <div class="container py-5 text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Mengubah ikon dari bi-boxes menjadi bi-heart-pulse (Simbol Pet Care/Kesehatan Hewan) -->
                <div class="bg-primary bg-gradient text-white d-inline-flex align-items-center justify-content-center fs-1 rounded-circle p-3 mb-4 shadow" style="width: 80px; height: 80px;">
                    <i class="bi bi-heart-pulse"></i>
                </div>
                <h1 class="display-4 fw-bold text-dark tracking-tight">Sistem Data Hewan Peliharaan</h1>
                <p class="lead text-muted my-4">Platform terintegrasi untuk mendata, memonitor, dan melacak informasi ras, usia, serta kepemilikan hewan peliharaan secara praktis dan terstruktur.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <!-- Mengubah rute tautan dari /data-lab menjadi /data-hewan -->
                    <a href="/data-hewan" class="btn btn-primary btn-lg px-4 me-sm-2 fw-bold"><i class="bi bi-search me-2"></i>Jelajahi Data Hewan</a>
                    <a href="/about" class="btn btn-outline-secondary btn-lg px-4">Tentang Kami</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row g-4 text-center">
        <div class="col-md-4">
            <div class="p-4 bg-white rounded-3 shadow-sm border h-100">
                <!-- Mengubah ikon ke bi-card-list untuk pencatatan profil -->
                <i class="bi bi-card-list text-primary fs-2"></i>
                <h5 class="fw-bold my-3 text-dark">Profil Lengkap</h5>
                <p class="text-muted small mb-0">Mencatat detail ras, spesies, usia, hingga foto terkini dari setiap hewan peliharaan yang terdaftar.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-white rounded-3 shadow-sm border h-100">
                <i class="bi bi-file-earmark-pdf text-danger fs-2"></i>
                <h5 class="fw-bold my-3 text-dark">Ekspor Rekap PDF</h5>
                <p class="text-muted small mb-0">Memudahkan pencetakan dokumen laporan rekapitulasi data seluruh hewan peliharaan hanya dengan sekali klik.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-white rounded-3 shadow-sm border h-100">
                <i class="bi bi-shield-check text-success fs-2"></i>
                <h5 class="fw-bold my-3 text-dark">Akses Terproteksi</h5>
                <p class="text-muted small mb-0">Manajemen entri, pembaruan, dan penghapusan data dikunci rapat menggunakan autentikasi akun Admin.</p>
            </div>
        </div>
    </div>
</div>
@endsection