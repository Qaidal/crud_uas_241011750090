@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="bg-white text-dark py-5 border-bottom border-light">
    <div class="container py-5 text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-primary bg-gradient text-white d-inline-flex align-items-center justify-content-center fs-1 rounded-circle p-3 mb-4 shadow" style="width: 80px; height: 80px;">
                    <i class="bi bi-boxes"></i>
                </div>
                <h1 class="display-4 fw-bold text-dark tracking-tight">Sistem Inventaris Peralatan Lab</h1>
                <p class="lead text-muted my-4">Platform terintegrasi untuk memonitor, mendata, dan melacak status kelayakan serta ketersediaan seluruh aset operasional laboratorium komputer secara praktis dan realtime.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="/data-lab" class="btn btn-primary btn-lg px-4 me-sm-2 fw-bold"><i class="bi bi-search me-2"></i>Jelajahi Data Lab</a>
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
                <i class="bi bi-clock-history text-primary fs-2"></i>
                <h5 class="fw-bold my-3 text-dark">Pencatatan Realtime</h5>
                <p class="text-muted small mb-0">Kondisi fisik aset diperbarui berkala oleh kepala lab untuk menjamin kelancaran praktikum mahasiswa.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-white rounded-3 shadow-sm border h-100">
                <i class="bi bi-file-earmark-pdf text-danger fs-2"></i>
                <h5 class="fw-bold my-3 text-dark">Ekspor Laporan PDF</h5>
                <p class="text-muted small mb-0">Memudahkan birokrasi pengadaan dan pelaporan aset lab dalam satu klik dokumen cetak.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-white rounded-3 shadow-sm border h-100">
                <i class="bi bi-shield-check text-success fs-2"></i>
                <h5 class="fw-bold my-3 text-dark">Akses Terproteksi</h5>
                <p class="text-muted small mb-0">Halaman manipulasi entri data dikunci rapat menggunakan gerbang enkripsi autentikasi Admin.</p>
            </div>
        </div>
    </div>
</div>
@endsection