@extends('layouts.app')

@section('title', 'Data Hewan')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-dark">Katalog Hewan Peliharaan</h2>
        <p class="text-muted">Daftar informasi profil, ras, dan kepemilikan hewan peliharaan aktif.</p>
    </div>

    <div class="row g-4">
        @forelse($hewan as $pet)
        <div class="col-md-3">
            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                <img src="{{ asset('images/' . $pet->gambar) }}" class="card-img-top" style="height: 160px; object-fit: cover;" alt="{{ $pet->nama_hewan }}">
                <div class="card-body">
                    <!-- Menampilkan informasi Ras/Spesies sebagai badge -->
                    <span class="badge bg-primary mb-2">{{ $pet->ras_spesies }}</span>
                    <h6 class="card-title fw-bold text-dark mb-1">{{ $pet->nama_hewan }}</h6>
                    <p class="text-muted small mb-0"><strong>Jenis:</strong> {{ $pet->jenis }}</p>
                    <p class="text-muted small mb-0"><strong>Pemilik:</strong> {{ $pet->pemilik }}</p>
                </div>
                <div class="card-footer bg-white border-0 pt-0 pb-3">
                    <button class="btn btn-outline-primary btn-sm w-100 fw-bold" data-bs-toggle="modal" data-bs-target="#modal-{{ $pet->id_hewan }}">Lihat Detail</button>
                </div>
            </div>
        </div>

        <!-- Modal Detail Hewan -->
        <div class="modal fade" id="modal-{{ $pet->id_hewan }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold text-dark">Profil {{ $pet->nama_hewan }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ asset('images/' . $pet->gambar) }}" class="img-fluid rounded mb-3" style="max-height: 250px; object-fit: cover;" alt="Detail Gambar">
                        <table class="table table-bordered text-start small">
                            <tr>
                                <th style="width: 40%;">Nama Hewan</th>
                                <td>{{ $pet->nama_hewan }}</td>
                            </tr>
                            <tr>
                                <th>Jenis</th>
                                <td>{{ $pet->jenis }}</td>
                            </tr>
                            <tr>
                                <th>Ras / Spesies</th>
                                <td>{{ $pet->ras_spesies }}</td>
                            </tr>
                            <tr>
                                <th>Usia</th>
                                <td>{{ $pet->usia }} Tahun</td>
                            </tr>
                            <tr>
                                <th>Nama Pemilik</th>
                                <td>{{ $pet->pemilik }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5 text-muted">
            <i class="bi bi-folder-x d-block display-4 mb-3 text-secondary opacity-50"></i>
            <h5 class="fw-bold">Katalog Kosong</h5>
            <p class="small text-secondary mb-0">Belum ada data riil yang diinput oleh Administrator ke dalam database.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection