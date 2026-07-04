@extends('layouts.app')

@section('title', 'Katalog Hewan Peliharaan - Publik')

@section('styles')
<style>
    .hero-section {
        /* Mengubah gradien warna sedikit ke arah hijau/biru toska khas pet care/kesehatan jika diinginkan */
        background: linear-gradient(135deg, #0d9488, #0ea5e9);
        color: white;
        padding: 60px 0;
        margin-bottom: 40px;
    }
</style>
@endsection

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Mengubah brand dari LAB-CENTRAL menjadi PET-CENTRAL -->
            <a class="navbar-brand fw-bold" href="#">PET-CENTRAL</a>
            <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login Admin</a>
        </div>
    </nav>

    <div class="hero-section text-center">
        <div class="container">
            <h1 class="fw-bold">Sistem Informasi Hewan Peliharaan</h1>
            <p class="lead">Daftar rekapitulasi data profil dan kepemilikan hewan secara realtime.</p>
        </div>
    </div>

    <div class="container mb-5">
        <h3 class="fw-bold mb-4 text-dark">Daftar Hewan Peliharaan</h3>
        <div class="row g-4">
            <!-- Mengubah variabel dari $peralatan as $alat menjadi $hewan as $pet -->
            @foreach($hewan as $pet)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="/images/{{ $pet->gambar }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $pet->nama_hewan }}">
                    <div class="card-body">
                        <!-- Menampilkan informasi Ras/Spesies sebagai penanda badge utama -->
                        <span class="badge bg-primary mb-2">Ras: {{ $pet->ras_spesies }}</span>
                        <h5 class="card-title fw-bold text-dark">{{ $pet->nama_hewan }}</h5>
                        <p class="text-muted small mb-1"><strong>Jenis:</strong> {{ $pet->jenis }}</p>
                        <p class="text-muted small mb-1"><strong>Usia:</strong> {{ $pet->usia }} Tahun</p>
                        <p class="text-muted small mb-0"><strong>Pemilik:</strong> {{ $pet->pemilik }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection