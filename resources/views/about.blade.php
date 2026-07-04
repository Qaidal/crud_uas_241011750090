@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="container py-5">
    <div class="row align-items-center g-5 py-4">
        <div class="col-md-6">
            <div class="badge bg-light text-primary border border-primary px-3 py-2 rounded-pill fw-bold mb-3">TENTANG KAMI</div>
            <h2 class="fw-bold text-dark display-6 mb-3">Komitmen Manajemen Data Hewan Peliharaan</h2>
            <p class="text-muted text-justify">Aplikasi sistem informasi ini memfasilitasi pelacakan profil dan identitas hewan peliharaan secara transparan, komprehensif, dan sistematis.</p>
            <p class="text-muted text-justify">Kami memastikan setiap data identitas, ras, spesies, usia, hingga kepemilikan hewan terdokumentasi dengan baik guna menunjang kemudahan akses informasi yang valid dan terintegrasi.</p>
        </div>
        <div class="col-md-6">
            <div class="card bg-dark text-white p-4 rounded-3 shadow-sm border-0">
                <h5 class="fw-bold text-primary mb-3"><i class="bi bi-shield-fill-check me-2"></i>Visi & Misi Sistem</h5>
                <ul class="list-unstyled mb-0 text-white-50 small">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Menyediakan transparansi data profil dan karakteristik hewan peliharaan yang akurat.</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Mempermudah verifikasi dan validasi informasi kepemilikan secara digital dan terpusat.</li>
                    <li><i class="bi bi-check-circle-fill text-success me-2"></i>Menyajikan rekapitulasi data rekam identitas hewan yang terstruktur dan mudah diakses.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection