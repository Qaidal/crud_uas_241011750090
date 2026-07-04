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
        
        /* Tulisan Tebal & Pewarnaan */
        .fw-semibold { font-weight: bold; }
        .text-primary { color: #0d6efd; }
        .text-secondary { color: #495057; }

        /* Badge Soft Style */
        .badge {
            display: inline-block;
            padding: 4px 8px;
            font-size: 10px;
            font-weight: bold;
            border-radius: 50px; /* pill */
            text-align: center;
            background-color: #e2e3e5;
            color: #41464b;
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
        <h5>Panel Manajemen Data Hewan</h5>
        <p>Home / Panel Admin / <span class="current-page">Data Hewan Peliharaan</span></p>
    </div>

    <div class="card-title">Data Hewan Terdaftar</div>

    <table>
        <thead>
            <tr>
                <th class="text-center" style="width: 5%;">No</th>
                <th class="text-center" style="width: 12%;">Gambar</th>
                <th style="width: 20%;">Nama Hewan</th>
                <th style="width: 15%;">Jenis</th>
                <th style="width: 13%;">Usia</th>
                <th style="width: 17%;">Pemilik</th>
                <th style="width: 18%;">Ras / Spesies</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop data asli dari database ($hewan) -->
            @forelse($hewan as $index => $pet)
                <tr>
                    <td class="text-center fw-semibold text-muted">{{ $index + 1 }}</td>
                    <td class="text-center">
                        @if($pet->gambar && file_exists(public_path('images/' . $pet->gambar)))
                            <img src="{{ public_path('images/' . $pet->gambar) }}" class="img-container" alt="img">
                        @else
                            <div class="img-container" style="line-height: 45px; font-size: 9px; color: #999;">No Image</div>
                        @endif
                    </td>
                    <td class="fw-semibold text-primary">{{ $pet->nama_hewan }}</td>
                    <td>{{ $pet->jenis }}</td>
                    <td>{{ $pet->usia }} Tahun</td>
                    <td>{{ $pet->pemilik }}</td>
                    <td><span class="badge">{{ $pet->ras_spesies }}</span></td>
                </tr>
            @empty
                @php
                // Data simulasi fallback disesuaikan menjadi data hewan peliharaan
                $simulasi = [
                    ['nama' => 'Milo', 'jenis' => 'Kucing', 'usia' => '2 Tahun', 'pemilik' => 'Andi Wijaya', 'ras' => 'Persia'],
                    ['nama' => 'Rocky', 'jenis' => 'Anjing', 'usia' => '3 Tahun', 'pemilik' => 'Budi Santoso', 'ras' => 'Golden Retriever'],
                    ['nama' => 'Snowy', 'jenis' => 'Kelinci', 'usia' => '1 Tahun', 'pemilik' => 'Citra Lestari', 'ras' => 'Anggora'],
                    ['nama' => 'Bubbles', 'jenis' => 'Ikan', 'usia' => '1 Tahun', 'pemilik' => 'Dedi Kurniawan', 'ras' => 'Mas Koki'],
                    ['nama' => 'Chirpy', 'jenis' => 'Burung', 'usia' => '2 Tahun', 'pemilik' => 'Eka Putri', 'ras' => 'Lovebird'],
                ];
                
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
                    <td>{{ $item['usia'] }}</td>
                    <td>{{ $item['pemilik'] }}</td>
                    <td><span class="badge">{{ $item['ras'] }}</span></td>
                </tr>
                @endforeach
            @endforelse
        </tbody>
    </table>

    <div class="table-footer">
        <div class="footer-left">Showing 1 to {{ count($hewan) > 0 ? count($hewan) : count($simulasi) }} of {{ count($hewan) > 0 ? count($hewan) : count($simulasi) }} entries</div>
        <div class="footer-right">© 2026 Panel Sistem Informasi Manajemen | Pet Care</div>
    </div>

</body>
</html>