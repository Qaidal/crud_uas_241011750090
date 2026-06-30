@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-dark">Kontak Resmi & Pengaduan</h2>
        <p class="text-muted">Punya keluhan kerusakan alat atau pertanyaan seputar peminjaman ruang laboratorium? Hubungi kami langsung.</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-5">
            <div class="card p-4 border-0 shadow-sm bg-white h-100 d-flex flex-column justify-content-between">
                <div>
                    <h5 class="fw-bold text-dark mb-4"><i class="bi bi-geo-alt-fill text-primary me-2"></i>Alamat Kantor</h5>
                    <p class="text-muted small mb-4">Gedung Puskom Teknik, Lantai 3 Ruangan 302, Jl. Raya Kampus Utama, Kota Tangerang Selatan, Banten.</p>
                    
                    <h5 class="fw-bold text-dark mb-2"><i class="bi bi-telephone-inbound-fill text-success me-2"></i>Saluran Telepon</h5>
                    <p class="text-muted small mb-4">(021) 7412-1090 (Ext: 204)</p>
                    
                    <h5 class="fw-bold text-dark mb-2"><i class="bi bi-envelope-at-fill text-danger me-2"></i>Surel / Email Resmi</h5>
                    <p class="text-muted small mb-4">support-labtech@universitas.ac.id</p>
                </div>
                <div class="bg-light p-3 rounded-2 text-center border">
                    <span class="small text-muted fw-bold"><i class="bi bi-clock me-1 text-warning"></i>Jam Operasional: Senin - Jumat (08:00 - 16:00 WIB)</span>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card p-4 border-0 shadow-sm bg-white h-100">
                <h5 class="fw-bold text-dark mb-3"><i class="bi bi-chat-right-text-fill text-primary me-2"></i>Kirim Pesan Langsung</h5>
                <form action="#" method="POST" onsubmit="alert('Simulasi pengiriman aduan sukses!'); return false;">
                    <div class="mb-3"><label class="form-label small fw-bold">Nama Lengkap</label><input type="text" class="form-control text-muted" placeholder="Masukkan nama Anda" required></div>
                    <div class="mb-3"><label class="form-label small fw-bold">Email Aktif</label><input type="email" class="form-control text-muted" placeholder="nama@mahasiswa.ac.id" required></div>
                    <div class="mb-3"><label class="form-label small fw-bold">Isi Aduan / Pesan</label><textarea class="form-control text-muted" rows="4" placeholder="Tuliskan spesifikasi keluhan atau pesan Anda..." required></textarea></div>
                    <button type="submit" class="btn btn-primary w-100 fw-bold py-2"><i class="bi bi-send me-2"></i>Kirim Laporan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection