@extends('layouts.app')

@section('title', 'Edit Data Hewan')

@section('content')
<div class="container py-5" style="max-width: 600px;">
    <div class="card shadow-sm border-0 p-4">
        <h4 class="fw-bold mb-4">Form Edit Data Hewan</h4>
        <!-- Rute diarahkan menggunakan parameter id_hewan -->
        <form action="{{ route('admin.update', $hewan->id_hewan) }}" method="POST" enctype="multipart/form-data">
            @csrf 
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">Nama Hewan</label>
                <input type="text" name="nama_hewan" class="form-control" value="{{ $hewan->nama_hewan }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Jenis</label>
                <input type="text" name="jenis" class="form-control" value="{{ $hewan->jenis }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Usia (Tahun)</label>
                <input type="number" name="usia" class="form-control" value="{{ $hewan->usia }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Pemilik</label>
                <input type="text" name="pemilik" class="form-control" value="{{ $hewan->pemilik }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Ras / Spesies</label>
                <input type="text" name="ras_spesies" class="form-control" value="{{ $hewan->ras_spesies }}" required>
            </div>
            
            <div class="mb-4">
                <label class="form-label">Gambar Hewan (Kosongkan jika tidak diganti)</label>
                <input type="file" name="gambar" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-warning text-white w-100 fw-bold">Perbarui Data</button>
        </form>
    </div>
</div>
@endsection