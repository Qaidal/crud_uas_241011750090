@extends('layouts.app')
@section('title', 'Edit Peralatan')
@section('content')
<div class="container py-5" style="max-width: 600px;">
    <div class="card shadow-sm border-0 p-4">
        <h4 class="fw-bold mb-4">Form Edit Alat Lab</h4>
        <form action="{{ route('admin.update', $alat->id_alat) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3"><label class="form-label">Nama Alat</label><input type="text" name="nama_alat" class="form-control" value="{{ $alat->nama_alat }}" required></div>
            <div class="mb-3"><label class="form-label">Jenis</label><input type="text" name="jenis" class="form-control" value="{{ $alat->jenis }}" required></div>
            <div class="mb-3"><label class="form-label">Kondisi</label><select name="kondisi" class="form-select"><option value="Baik" {{ $alat->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option><option value="Rusak Ringan" {{ $alat->kondisi == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option></select></div>
            <div class="mb-3"><label class="form-label">Lokasi</label><input type="text" name="lokasi" class="form-control" value="{{ $alat->lokasi }}" required></div>
            <div class="mb-4"><label class="form-label">Gambar Alat (Kosongkan jika tidak diganti)</label><input type="file" name="gambar" class="form-control"></div>
            <button type="submit" class="btn btn-warning text-white w-100">Perbarui Data</button>
        </form>
    </div>
</div>
@endsection