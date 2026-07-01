@extends('layouts.app')

@section('title', 'Data Lab')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-dark">Katalog Peralatan Lab</h2>
        <p class="text-muted">Daftar inventaris sarana prasarana laboratorium komputer realtime aktif.</p>
    </div>

    <div class="row g-4">
        @forelse($peralatan as $alat)
        <div class="col-md-3">
            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                <img src="{{ asset('images/' . $alat->gambar) }}" class="card-img-top" style="height: 160px; object-fit: cover;" alt="{{ $alat->nama_alat }}">
                <div class="card-body">
                    <span class="badge {{ $alat->kondisi == 'Baik' ? 'bg-success' : 'bg-warning' }} mb-2">{{ $alat->kondisi }}</span>
                    <h6 class="card-title fw-bold text-dark mb-1">{{ $alat->nama_alat }}</h6>
                    <p class="text-muted small mb-0"><strong>Jenis:</strong> {{ $alat->jenis }}</p>
                </div>
                <div class="card-footer bg-white border-0 pt-0 pb-3">
                    <button class="btn btn-outline-primary btn-sm w-100 fw-bold" data-bs-toggle="modal" data-bs-target="#modal-{{ $alat->id_alat }}">Lihat Detail</button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-{{ $alat->id_alat }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold text-dark">{{ $alat->nama_alat }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ asset('images/' . $alat->gambar) }}" class="img-fluid rounded mb-3" style="max-height: 250px; object-fit: cover;" alt="Detail Gambar">
                        <table class="table table-bordered text-start small">
                            <tr>
                                <th style="width: 40%;">Kondisi Fisik</th>
                                <td><span class="badge {{ $alat->kondisi == 'Baik' ? 'bg-success' : 'bg-warning' }}">{{ $alat->kondisi }}</span></td>
                            </tr>
                            <tr>
                                <th>Kategori Jenis</th>
                                <td>{{ $alat->jenis }}</td>
                            </tr>
                            <tr>
                                <th>Lokasi Penyimpanan</th>
                                <td>{{ $alat->lokasi }}</td>
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