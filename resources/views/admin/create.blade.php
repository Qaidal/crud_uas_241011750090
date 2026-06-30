@extends('layouts.app')
@section('title', 'Tambah Peralatan')
@section('content')
<div class="container py-5" style="max-width: 600px;">
    <div class="card shadow-sm border-0 p-4">
        <h4 class="fw-bold mb-4">Form Tambah Alat Lab</h4>
        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3"><label class="form-label">Nama Alat</label><input type="text" name="nama_alat" class="form-control" required></div>
            <div class="mb-3"><label class="form-label">Jenis</label><input type="text" name="jenis" class="form-control" required></div>
            <div class="mb-3"><label class="form-label">Kondisi</label><select name="kondisi" class="form-select"><option value="Baik">Baik</option><option value="Rusak Ringan">Rusak Ringan</option></select></div>
            <div class="mb-3"><label class="form-label">Lokasi</label><input type="text" name="lokasi" class="form-control" required></div>
            <div class="mb-4"><label class="form-label">Gambar Alat</label><input type="file" name="gambar" class="form-control" required></div>
            <button type="submit" class="btn btn-success w-100">Simpan Data</button>
        </form>
    </div>
</div>
@endsection