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
                    <h5 class="fw-bold text-dark mb-1">PANEL MANAJEMEN INVENTARIS</h5>
                    <p class="text-muted small mb-0">Home / Panel Admin / <span class="text-primary fw-medium">Data Peralatan Lab</span></p>
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
            <h5 class="fw-bold text-dark mb-3">Data Peralatan Terdaftar</h5>
            
            <div class="table-responsive">
                <table class="table table-hover align-middle border-top mb-0">
                    <thead class="table-light text-secondary text-uppercase small fw-bold">
                        <tr>
                            <th scope="col" class="py-3 px-3 text-center" style="width: 5%;">No</th>
                            <th scope="col" class="py-3 text-center" style="width: 10%;">Gambar</th>
                            <th scope="col" class="py-3">Nama Alat</th>
                            <th scope="col" class="py-3">Jenis</th>
                            <th scope="col" class="py-3" style="width: 15%;">Kondisi</th>
                            <th scope="col" class="py-3">Lokasi</th>
                            <th scope="col" class="py-3 text-center" style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        @forelse($peralatan as $index => $alat)
                        <tr>
                            <td class="text-center fw-medium px-3">{{ $index + 1 }}</td>
                            <td class="text-center">
                                <img src="/images/{{ $alat->gambar }}" class="rounded shadow-sm border" style="width: 60px; height: 45px; object-fit: cover;" alt="{{ $alat->nama_alat }}">
                            </td>
                            <td class="fw-semibold text-primary">{{ $alat->nama_alat }}</td>
                            <td>{{ $alat->jenis }}</td>
                            <td>
                                <span class="badge rounded-pill px-2 py-1 {{ $alat->kondisi == 'Baik' ? 'bg-success bg-opacity-10 text-success' : 'bg-warning bg-opacity-10 text-warning' }}">
                                    {{ $alat->kondisi }}
                                </span>
                            </td>
                            <td class="text-muted small">{{ $alat->lokasi }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.edit', $alat->id_alat) }}" class="btn btn-sm btn-success px-3 py-1 fw-medium shadow-sm">Edit</a>
                                    
                                    <form action="{{ route('admin.delete', $alat->id_alat) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data alat ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger px-2 py-1 fw-medium shadow-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        
                        @php
                        $simulasi = [
                            ['nama' => 'PC Gaming i7 Workstation', 'jenis' => 'Komputer Client', 'kondisi' => 'Baik', 'lokasi' => 'Lab Multimedia - Meja 04', 'img' => 'https://images.unsplash.com/photo-1547082299-de196ea013d6?w=100'],
                            ['nama' => 'MikroTik Cloud Router 1036', 'jenis' => 'Perangkat Jaringan', 'kondisi' => 'Baik', 'lokasi' => 'Ruang Server Pusat', 'img' => 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=100'],
                            ['nama' => 'Projector Epson EB-X400', 'jenis' => 'Multimedia Display', 'kondisi' => 'Rusak Ringan', 'lokasi' => 'Gudang Inventaris B', 'img' => 'https://images.unsplash.com/photo-1535016120720-40c646be5580?w=100'],
                            ['nama' => 'Arduino Uno R3 Starter Kit', 'jenis' => 'Modul Mikrokontroler', 'kondisi' => 'Baik', 'lokasi' => 'Lemari Lab IoT A-2', 'img' => 'https://images.unsplash.com/photo-1553406830-ef2513450d76?w=100'],
                            ['nama' => 'Server Dell PowerEdge T440', 'jenis' => 'Infrastruktur Server', 'kondisi' => 'Baik', 'lokasi' => 'Ruang Rack Server 01', 'img' => 'https://images.unsplash.com/photo-1620712943543-bcc4688e7485?w=100'],
                            ['nama' => 'Logitech HD Webcam C922 Pro', 'jenis' => 'Aksesoris Komputer', 'kondisi' => 'Baik', 'lokasi' => 'Meja Instruktur Lab 1', 'img' => 'https://images.unsplash.com/photo-1629429408209-1f912961dbd8?w=100'],
                            ['nama' => 'Cisco Switch Catalyst 2960', 'jenis' => 'Perangkat Jaringan', 'kondisi' => 'Baik', 'lokasi' => 'Lab Jaringan - Rack B', 'img' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=100'],
                            ['nama' => 'Raspberry Pi 4 Model B (8GB)', 'jenis' => 'Mini PC / Modul IoT', 'kondisi' => 'Rusak Ringan', 'lokasi' => 'Lemari Lab IoT A-3', 'img' => 'https://images.unsplash.com/photo-1563770660941-20978e870e26?w=100'],
                        ];
                        @endphp

                        @foreach($simulasi as $idx => $item)
                        <tr>
                            <td class="text-center text-muted px-3">{{ $idx + 1 }}</td>
                            <td class="text-center">
                                <img src="{{ $item['img'] }}" class="rounded shadow-sm border" style="width: 60px; height: 45px; object-fit: cover;" alt="img">
                            </td>
                            <td class="fw-semibold text-secondary">
                                {{ $item['nama'] }} 
                                <span class="badge bg-secondary small ms-1" style="font-size: 10px; opacity: 0.7;">Simulasi</span>
                            </td>
                            <td>{{ $item['jenis'] }}</td>
                            <td>
                                <span class="badge rounded-pill px-2 py-1 {{ $item['kondisi'] == 'Baik' ? 'bg-success bg-opacity-10 text-success' : 'bg-warning bg-opacity-10 text-warning' }}">
                                    {{ $item['kondisi'] }}
                                </span>
                            </td>
                            <td class="text-muted small">{{ $item['lokasi'] }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-sm btn-success px-3 py-1 fw-medium shadow-sm" onclick="alert('Klik tombol Add Data di atas terlebih dahulu untuk membuat data asli!')">Edit</button>
                                    <button class="btn btn-sm btn-danger px-2 py-1 fw-medium shadow-sm" onclick="alert('Ini data tiruan template HTML, buat data asli lewat tombol Add Data untuk mencoba fungsi hapus.')">Delete</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top text-muted small">
                <div>Showing 1 to {{ count($peralatan) > 0 ? count($peralatan) : 8 }} of {{ count($peralatan) > 0 ? count($peralatan) : 8 }} entries</div>
                <div><span>© 2026 Panel Sistem Informasi Inventaris | Lab-Tech</span></div>
            </div>

        </div>
    </div>
</div>
@endsection