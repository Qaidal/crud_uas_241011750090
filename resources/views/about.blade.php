@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="container py-5">
    <div class="row align-items-center g-5 py-4">
        <div class="col-md-6">
            <div class="badge bg-light text-primary border border-primary px-3 py-2 rounded-pill fw-bold mb-3">TENTANG KAMI</div>
            <h2 class="fw-bold text-dark display-6 mb-3">Komitmen Manajemen Mutu Alat Praktikum</h2>
            <p class="text-muted text-justify">Aplikasi sistem informasi inventaris ini memfasilitasi pelacakan kondisi kelayakan aset peralatan laboratorium secara transparan, komprehensif, dan sistematis.</p>
            <p class="text-muted text-justify">Kami memastikan setiap komputer, perangkat jaringan, server, dan modul mikrokontroler terdokumentasi dengan baik guna menunjang target riset teknologi mutakhir di lingkungan kampus.</p>
        </div>
        <div class="col-md-6">
            <div class="card bg-dark text-white p-4 rounded-3 shadow-sm border-0">
                <h5 class="fw-bold text-primary mb-3"><i class="bi bi-shield-fill-check me-2"></i>Visi & Misi Inventaris</h5>
                <ul class="list-unstyled mb-0 text-white-50 small">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Menyediakan transparansi data kondisi aset sarana prasarana laboratorium.</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Mencegah malfungsi alat saat jam perkuliahan melalui inspeksi digital terpusat.</li>
                    <li><i class="bi bi-check-circle-fill text-success me-2"></i>Mempermudah pelacakan mutasi lokasi peletakan unit komputer antar lab.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection