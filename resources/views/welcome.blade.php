@extends('layouts.app')

@section('title', 'Katalog Peralatan Lab - Publik')

@section('styles')
<style>
    .hero-section {
        background: linear-gradient(135deg, #1e3a8a, #3b82f6);
        color: white;
        padding: 60px 0;
        margin-bottom: 40px;
    }
</style>
@endsection

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">LAB-CENTRAL</a>
            <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login Admin</a>
        </div>
    </nav>

    <div class="hero-section text-center">
        <div class="container">
            <h1 class="fw-bold">Sistem Informasi Peralatan Lab</h1>
            <p class="lead">Daftar inventaris alat praktikum realtime dan informatif.</p>
        </div>
    </div>

    <div class="container mb-5">
        <h3 class="fw-bold mb-4 text-dark">Daftar Peralatan Tersedia</h3>
        <div class="row g-4">
            @foreach($peralatan as $alat)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="/images/{{ $alat->gambar }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $alat->nama_alat }}">
                    <div class="card-body">
                        <span class="badge {{ $alat->kondisi == 'Baik' ? 'bg-success' : 'bg-warning' }} mb-2">Kondisi: {{ $alat->kondisi }}</span>
                        <h5 class="card-title fw-bold">{{ $alat->nama_alat }}</h5>
                        <p class="text-muted small mb-1"><strong>Jenis:</strong> {{ $alat->jenis }}</p>
                        <p class="text-muted small mb-0"><strong>Lokasi:</strong> {{ $alat->lokasi }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection