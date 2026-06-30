<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Manajemen Admin - Export PDF</title>
    <style>
        /* Menggunakan font standar DomPDF yang mirip dengan Bootstrap */
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 12px;
            color: #212529;
            margin: 5px;
            background-color: #ffffff;
        }
        
        /* Nav/Header ala Dashboard Panel */
        .panel-header {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .panel-header h5 {
            margin: 0 0 5px 0;
            font-size: 14px;
            font-weight: bold;
            color: #212529;
            text-transform: uppercase;
        }
        .panel-header p {
            margin: 0;
            color: #6c757d;
            font-size: 11px;
        }
        .panel-header .current-page {
            color: #0d6efd;
            font-weight: 500;
        }

        /* Card Wrapper Tabel */
        .card-title {
            font-size: 14px;
            font-weight: bold;
            color: #212529;
            margin-bottom: 15px;
        }

        /* Struktur Tabel Utama ala Bootstrap Table Hover */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        th {
            background-color: #f8f9fa;
            color: #6c757d;
            text-transform: uppercase;
            font-size: 10px;
            font-weight: bold;
            padding: 12px 10px;
            border-top: 1px solid #dee2e6;
            border-bottom: 1px solid #dee2e6;
        }
        td {
            padding: 12px 10px;
            border-bottom: 1px solid #dee2e6;
            vertical-align: middle;
        }
        
        /* Zebra Striping Ringan ala Table Hover */
        tr:nth-child(even) td {
            background-color: #fafafa;
        }

        /* Penyelarasan Posisi */
        .text-center { text-align: center; }
        .text-muted { color: #6c757d; }
        .small { font-size: 11px; }
        
        /* Nama Alat Tebal & Biru sesuai Dashboard */
        .fw-semibold { font-weight: bold; }
        .text-primary { color: #0d6efd; }
        .text-secondary { color: #495057; }

        /* Badge Efek Opacity (Background Soft, Teks Pekat) */
        .badge {
            display: inline-block;
            padding: 4px 8px;
            font-size: 10px;
            font-weight: bold;
            border-radius: 50px; /* pill */
            text-align: center;
        }
        .badge-success {
            background-color: #d1e7dd; /* bg-success bg-opacity-10 */
            color: #0f5132;
        }
        .badge-warning {
            background-color: #fff3cd; /* bg-warning bg-opacity-10 */
            color: #664d03;
        }
        .badge-simulasi {
            background-color: #e2e3e5;
            color: #41464b;
            font-size: 8px;
            padding: 2px 5px;
            border-radius: 4px;
            margin-left: 3px;
        }

        /* Desain Frame Gambar Thumbnail */
        .img-container {
            width: 60px;
            height: 45px;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            background-color: #f8f9fa;
        }

        /* Footer Keterangan Halaman */
        .table-footer {
            border-top: 1px solid #dee2e6;
            padding-top: 15px;
            font-size: 11px;
            color: #6c757d;
        }
        .footer-left { float: left; }
        .footer-right { float: right; }
    </style>
</head>
<body>

    <div class="panel-header">
        <h5>Panel Manajemen Inventaris</h5>
        <p>Home / Panel Admin / <span class="current-page">Data Peralatan Lab</span></p>
    </div>

    <div class="card-title">Data Peralatan Terdaftar</div>

    <table>
        <thead>
            <tr>
                <th class="text-center" style="width: 5%;">No</th>
                <th class="text-center" style="width: 12%;">Gambar</th>
                <th style="width: 25%;">Nama Alat</th>
                <th style="width: 18%;">Jenis</th>
                <th style="width: 15%;">Kondisi</th>
                <th style="width: 25%;">Lokasi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($peralatan as $index => $alat)
                <tr>
                    <td class="text-center fw-semibold text-muted">{{ $index + 1 }}</td>
                    <td class="text-center">
                        @if($alat->gambar && file_exists(public_path('images/' . $alat->gambar)))
                            <img src="{{ public_path('images/' . $alat->gambar) }}" class="img-container" alt="img">
                        @else
                            <div class="img-container" style="line-height: 45px; font-size: 9px; color: #999;">No Image</div>
                        @endif
                    </td>
                    <td class="fw-semibold text-primary">{{ $alat->nama_alat }}</td>
                    <td>{{ $alat->jenis }}</td>
                    <td>
                        <span class="badge {{ $alat->kondisi == 'Baik' ? 'badge-success' : 'badge-warning' }}">
                            {{ $alat->kondisi }}
                        </span>
                    </td>
                    <td class="text-muted small">{{ $alat->lokasi }}</td>
                </tr>
            @empty
                @php
                $simulasi = [
                    ['nama' => 'PC Gaming i7 Workstation', 'jenis' => 'Komputer Client', 'kondisi' => 'Baik', 'lokasi' => 'Lab Multimedia - Meja 04'],
                    ['nama' => 'MikroTik Cloud Router 1036', 'jenis' => 'Perangkat Jaringan', 'kondisi' => 'Baik', 'lokasi' => 'Ruang Server Pusat'],
                    ['nama' => 'Projector Epson EB-X400', 'jenis' => 'Multimedia Display', 'kondisi' => 'Rusak Ringan', 'lokasi' => 'Gudang Inventaris B'],
                    ['nama' => 'Arduino Uno R3 Starter Kit', 'jenis' => 'Modul Mikrokontroler', 'kondisi' => 'Baik', 'lokasi' => 'Lemari Lab IoT A-2'],
                    ['nama' => 'Server Dell PowerEdge T440', 'jenis' => 'Infrastruktur Server', 'kondisi' => 'Baik', 'lokasi' => 'Ruang Rack Server 01'],
                    ['nama' => 'Logitech HD Webcam C922 Pro', 'jenis' => 'Aksesoris Komputer', 'kondisi' => 'Baik', 'lokasi' => 'Meja Instruktur Lab 1'],
                    ['nama' => 'Cisco Switch Catalyst 2960', 'jenis' => 'Perangkat Jaringan', 'kondisi' => 'Baik', 'lokasi' => 'Lab Jaringan - Rack B'],
                    ['nama' => 'Raspberry Pi 4 Model B (8GB)', 'jenis' => 'Mini PC / Modul IoT', 'kondisi' => 'Rusak Ringan', 'lokasi' => 'Lemari Lab IoT A-3'],
                ];
                
                // Menggunakan string base64 super minimalis bermotif kotak abu transparan agar kolom gambar tidak kosong melompong saat simulasi
                $placeholderBase64 = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+M9QDwADhgGAWjR9awAAAABJRU5ErkJggg==';
                @endphp

                @foreach($simulasi as $idx => $item)
                <tr>
                    <td class="text-center text-muted small">{{ $idx + 1 }}</td>
                    <td class="text-center">
                        <img src="{{ $placeholderBase64 }}" class="img-container" style="background-color: #eaeaea;" alt="img">
                    </td>
                    <td class="fw-semibold text-secondary">
                        {{ $item['nama'] }} <span class="badge-simulasi">Simulasi</span>
                    </td>
                    <td>{{ $item['jenis'] }}</td>
                    <td>
                        <span class="badge {{ $item['kondisi'] == 'Baik' ? 'badge-success' : 'badge-warning' }}">
                            {{ $item['kondisi'] }}
                        </span>
                    </td>
                    <td class="text-muted small">{{ $item['lokasi'] }}</td>
                </tr>
                @endforeach
            @endforelse
        </tbody>
    </table>

    <div class="table-footer">
        <div class="footer-left">Showing 1 to {{ count($peralatan) > 0 ? count($peralatan) : 8 }} of {{ count($peralatan) > 0 ? count($peralatan) : 8 }} entries</div>
        <div class="footer-right">© 2026 Panel Sistem Informasi Inventaris | Lab-Tech</div>
    </div>

</body>
</html>