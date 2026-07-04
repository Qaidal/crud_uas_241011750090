@extends('layouts.app')

@section('title', 'Dashboard Manajemen Admin')

@section('content')
<div class="container py-4">
    
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
        <div class="d-flex align-items-center">
            <i class="bi bi-check-circle-fill me-2 fs-5"></i>
            <div><strong>Sukses!</strong> {{ session('success') }}</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card border-0 shadow-sm rounded-3 mb-4 bg-light">
        <div class="card-body p-3">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <!-- Penyesuaian judul header panel admin -->
                    <h5 class="fw-bold text-dark mb-1">PANEL MANAJEMEN DATA HEWAN</h5>
                    <p class="text-muted small mb-0">Home / Panel Admin / <span class="text-primary fw-medium">Data Hewan Peliharaan</span></p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                    <a href="{{ route('admin.index') }}" class="btn btn-outline-secondary fw-semibold btn-sm px-3 me-2 shadow-sm">
                        <i class="bi bi-arrow-left-short me-1"></i> Kembali ke Awal
                    </a>
                    <a href="{{ route('admin.create') }}" class="btn btn-primary fw-semibold btn-sm px-3 shadow-sm me-2">
                        <i class="bi bi-plus-lg me-1"></i> Add Data
                    </a>
                    <a href="{{ route('admin.pdf') }}" class="btn btn-danger fw-semibold btn-sm px-3 shadow-sm me-2">
                        <i class="bi bi-file-earmark-pdf me-1"></i> PDF
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin keluar?')">
                        @csrf
                        <button type="submit" class="btn btn-dark fw-semibold btn-sm px-3 shadow-sm">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-4">
            <h5 class="fw-bold text-dark mb-3">Data Hewan Terdaftar</h5>
            
            <div class="table-responsive">
                <table class="table table-hover align-middle border-top mb-0">
                    <!-- Menyusun kolom th agar identik dengan tabel Data Hewan Peliharaan -->
                    <thead class="table-light text-secondary text-uppercase small fw-bold">
                        <tr>
                            <th scope="col" class="py-3 px-3 text-center" style="width: 5%;">No</th>
                            <th scope="col" class="py-3 text-center" style="width: 10%;">Gambar</th>
                            <th scope="col" class="py-3">Nama Hewan</th>
                            <th scope="col" class="py-3">Jenis</th>
                            <th scope="col" class="py-3" style="width: 10%;">Usia</th>
                            <th scope="col" class="py-3">Pemilik</th>
                            <th scope="col" class="py-3">Ras / Spesies</th>
                            <th scope="col" class="py-3 text-center" style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        <!-- Mengubah dari $peralatan ke $hewan -->
                        @forelse($hewan as $index => $pet)
                        <tr>
                            <td class="text-center fw-medium px-3">{{ $index + 1 }}</td>
                            <td class="text-center">
                                <img src="{{ asset('images/' . $pet->gambar) }}" class="rounded shadow-sm border" style="width: 60px; height: 45px; object-fit: cover;" alt="{{ $pet->nama_hewan }}">
                            </td>
                            <td class="fw-semibold text-primary">{{ $pet->nama_hewan }}</td>
                            <td>{{ $pet->jenis }}</td>
                            <td>{{ $pet->usia }} Tahun</td>
                            <td>{{ $pet->pemilik }}</td>
                            <td>
                                <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-2 py-1">
                                    {{ $pet->ras_spesies }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <!-- Mengubah ID acuan parameter rute menjadi id_hewan -->
                                    <a href="{{ route('admin.edit', $pet->id_hewan) }}" class="btn btn-sm btn-success px-3 py-1 fw-medium shadow-sm">Edit</a>
                                    
                                    <form action="{{ route('admin.delete', $pet->id_hewan) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data hewan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger px-2 py-1 fw-medium shadow-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <!-- Colspan diubah dari 7 menjadi 8 karena pertambahan kolom tabel -->
                            <td colspan="8" class="text-center py-5 text-muted">
                                <i class="bi bi-heart-broken d-block fs-1 mb-3 text-secondary opacity-50"></i>
                                <span class="fw-medium">Belum ada data hewan peliharaan di database.</span><br>
                                <small class="text-secondary">Silakan jalankan seeder atau klik tombol <strong>Add Data</strong> di atas.</small>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top text-muted small">
                <div>Showing {{ count($hewan) > 0 ? '1 to ' . count($hewan) : '0' }} of {{ count($hewan) }} entries</div>
                <div><span>© 2026 Panel Sistem Informasi Manajemen | Pet Care</span></div>
            </div>

        </div>
    </div>
</div>
@endsection