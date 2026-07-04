@extends('layouts.app')

@section('title', 'Tambah Data Hewan')

@section('content')
<div class="container py-5" style="max-width: 600px;">
    <div class="card shadow-sm border-0 p-4">
        <h4 class="fw-bold mb-4">Form Tambah Data Hewan</h4>
        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Nama Hewan</label>
                <input type="text" name="nama_hewan" class="form-control" placeholder="Contoh: Milo" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Jenis</label>
                <input type="text" name="jenis" class="form-control" placeholder="Contoh: Kucing, Anjing" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Usia (Tahun)</label>
                <input type="number" name="usia" class="form-control" placeholder="Contoh: 2" min="0" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Pemilik</label>
                <input type="text" name="pemilik" class="form-control" placeholder="Nama pemilik hewan" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Ras / Spesies</label>
                <input type="text" name="ras_spesies" class="form-control" placeholder="Contoh: Persia, Golden Retriever" required>
            </div>
            
            <div class="mb-4">
                <label class="form-label">Gambar Hewan</label>
                <input type="file" name="gambar" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-success w-100 fw-bold">Simpan Data</button>
        </form>
    </div>
</div>
@endsection