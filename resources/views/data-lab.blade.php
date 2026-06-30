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
                <img src="/images/{{ $alat->gambar }}" class="card-img-top" style="height: 160px; object-fit: cover;" alt="img">
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
                        <img src="/images/{{ $alat->gambar }}" class="img-fluid rounded mb-3" style="max-height: 250px; object-fit: cover;">
                        <table class="table table-bordered text-start small">
                            <tr><th>Kondisi Fisik</th><td><span class="badge {{ $alat->kondisi == 'Baik' ? 'bg-success' : 'bg-warning' }}">{{ $alat->kondisi }}</span></td></tr>
                            <tr><th>Kategori Jenis</th><td>{{ $alat->jenis }}</td></tr>
                            <tr><th>Lokasi Penyimpanan</th><td>{{ $alat->lokasi }}</td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @empty
        
        @php
        $simulasi = [
            ['id' => 's1', 'nama' => 'PC Gaming i7 Workstation', 'jenis' => 'Komputer Client', 'kondisi' => 'Baik', 'lokasi' => 'Lab Multimedia - Meja 04', 'img' => 'https://images.unsplash.com/photo-1547082299-de196ea013d6?w=500&auto=format&fit=crop&q=60'],
            ['id' => 's2', 'nama' => 'MikroTik Cloud Router 1036', 'jenis' => 'Perangkat Jaringan', 'kondisi' => 'Baik', 'lokasi' => 'Ruang Server Pusat', 'img' => 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=500&auto=format&fit=crop&q=60'],
            ['id' => 's3', 'nama' => 'Projector Epson EB-X400', 'jenis' => 'Multimedia Display', 'kondisi' => 'Rusak Ringan', 'lokasi' => 'Gudang Inventaris B', 'img' => 'https://images.unsplash.com/photo-1535016120720-40c646be5580?w=500&auto=format&fit=crop&q=60'],
            ['id' => 's4', 'nama' => 'Arduino Uno R3 Starter Kit', 'jenis' => 'Modul Mikrokontroler', 'kondisi' => 'Baik', 'lokasi' => 'Lemari Lab IoT A-2', 'img' => 'https://images.unsplash.com/photo-1553406830-ef2513450d76?w=600&auto=format&fit=crop&q=80'],
            ['id' => 's5', 'nama' => 'Server Dell PowerEdge T440', 'jenis' => 'Infrastruktur Server', 'kondisi' => 'Baik', 'lokasi' => 'Ruang Rack Server 01', 'img' => 'https://images.unsplash.com/photo-1620712943543-bcc4688e7485?w=500&auto=format&fit=crop&q=60'],
            ['id' => 's6', 'nama' => 'Logitech HD Webcam C922 Pro', 'jenis' => 'Aksesoris Komputer', 'kondisi' => 'Baik', 'lokasi' => 'Meja Instruktur Lab 1', 'img' => 'https://images.unsplash.com/photo-1629429408209-1f912961dbd8?w=500&auto=format&fit=crop&q=60'],
            ['id' => 's7', 'nama' => 'Cisco Switch Catalyst 2960', 'jenis' => 'Perangkat Jaringan', 'kondisi' => 'Baik', 'lokasi' => 'Lab Jaringan - Rack B', 'img' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=500&auto=format&fit=crop&q=60'],
            ['id' => 's8', 'nama' => 'Raspberry Pi 4 Model B (8GB)', 'jenis' => 'Mini PC / Modul IoT', 'kondisi' => 'Rusak Ringan', 'lokasi' => 'Lemari Lab IoT A-3', 'img' => 'https://images.unsplash.com/photo-1563770660941-20978e870e26?w=500&auto=format&fit=crop&q=60'],
        ];
        @endphp

        @foreach($simulasi as $item)
        <div class="col-md-3">
            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                <img src="{{ $item['img'] }}" class="card-img-top" style="height: 160px; object-fit: cover;" alt="Aset Lab">
                <div class="card-body">
                    <span class="badge {{ $item['kondisi'] == 'Baik' ? 'bg-success' : 'bg-warning' }} mb-2">{{ $item['kondisi'] }}</span>
                    <h6 class="card-title fw-bold text-dark mb-1">{{ $item['nama'] }}</h6>
                    <p class="text-muted small mb-0"><strong>Jenis:</strong> {{ $item['jenis'] }}</p>
                </div>
                <div class="card-footer bg-white border-0 pt-0 pb-3">
                    <button class="btn btn-outline-primary btn-sm w-100 fw-bold" data-bs-toggle="modal" data-bs-target="#modal-{{ $item['id'] }}">Lihat Detail</button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-{{ $item['id'] }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold text-dark">{{ $item['nama'] }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ $item['img'] }}" class="img-fluid rounded mb-3" style="max-height: 250px; object-fit: cover;" alt="Detail Gambar">
                        <table class="table table-bordered text-start small">
                            <tr><th>Kondisi Fisik</th><td><span class="badge {{ $item['kondisi'] == 'Baik' ? 'bg-success' : 'bg-warning' }}">{{ $item['kondisi'] }}</span></td></tr>
                            <tr><th>Kategori Jenis</th><td>{{ $item['jenis'] }}</td></tr>
                            <tr><th>Lokasi Penyimpanan</th><td>{{ $item['lokasi'] }}</td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        @endforelse
    </div>
</div>
@endsection