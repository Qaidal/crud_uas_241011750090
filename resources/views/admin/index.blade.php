@extends('layouts.app')

@section('title', 'Autentikasi Berhasil')

@section('content')
<div class="container py-5 my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-3 p-4 text-center bg-white border">
                <div class="card-body">
                    <div class="text-success display-3 mb-4">
                        <i class="bi bi-shield-fill-check"></i>
                    </div>
                    
                    <h3 class="fw-bold text-dark mb-2">Autentikasi Berhasil!</h3>
                    
                    <p class="text-muted small px-3 mb-4">
                        Selamat datang di Panel Kendali Utama Sistem Informasi Manajemen Data Hewan Peliharaan. Anda masuk sebagai <strong>Administrator Resmi</strong>.
                    </p>
                    
                    <hr class="my-4 text-secondary" style="opacity: 0.15;">
                    
                    <p class="small text-muted mb-4">Silakan klik tombol di bawah ini untuk mulai mengelola profil, rekapitulasi, dan identitas data hewan.</p>
                    
                    <div class="d-flex flex-column flex-sm-row justify-content-center gap-2 px-2">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary fw-semibold px-4 py-2 shadow-sm">
                            <i class="bi bi-speedometer2 me-2"></i>Masuk ke Dashboard Admin
                        </a>
                        
                        <form action="{{ route('logout') }}" method="POST" class="d-inline m-0" onsubmit="return confirm('Apakah Anda yakin ingin keluar?')">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger fw-semibold px-4 py-2 w-100">
                                <i class="bi bi-box-arrow-right me-2"></i>Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection