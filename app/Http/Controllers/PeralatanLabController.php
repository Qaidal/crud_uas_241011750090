<?php

namespace App\Http\Controllers;

use App\Models\PeralatanLab;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PeralatanLabController extends Controller
{
    public function publicIndex() {
        $peralatan = PeralatanLab::all();
        return view('data-lab', compact('peralatan'));
    }

    /**
     * Halaman Index Utama Admin (Gerbang Awal)
     */
    public function index() {
        return view('admin.index');
    }

    /**
     * Halaman Dashboard Admin
     * Ditambahkan latest() agar data riil yang baru Anda masukkan / edit langsung nangkring di baris paling atas!
     */
    public function dashboard() {
        $peralatan = PeralatanLab::latest()->get();
        return view('admin.dashboard', compact('peralatan'));
    }

    public function create() {
        return view('admin.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_alat' => 'required|string|max:255',
            'jenis'     => 'required|string|max:255',
            'kondisi'   => 'required|string',
            'lokasi'    => 'required|string',
            'gambar'    => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $input = $request->all();
        if ($image = $request->file('gambar')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage";
        }

        PeralatanLab::create($input);
        
        return redirect()->route('admin.dashboard')->with('success', 'Peralatan Lab berhasil ditambahkan!');
    }

    /**
     * KUNCI FIX EDIT: Mencari data berdasarkan kolom 'id_alat' secara spesifik
     */
    public function edit($id) {
        $alat = PeralatanLab::where('id_alat', $id)->firstOrFail();
        return view('admin.edit', compact('alat'));
    }

    /**
     * KUNCI FIX UPDATE: Menangkap ID Alat dengan benar, memperbarui database, dan mengembalikan ke dashboard
     */
    public function update(Request $request, $id) {
        $request->validate([
            'nama_alat' => 'required|string|max:255',
            'jenis'     => 'required|string|max:255',
            'kondisi'   => 'required|string',
            'lokasi'    => 'required|string',
            'gambar'    => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $alat = PeralatanLab::where('id_alat', $id)->firstOrFail();
        $input = $request->all();

        if ($image = $request->file('gambar')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage";
            
            if($alat->gambar && file_exists(public_path('images/'.$alat->gambar))) {
                unlink(public_path('images/'.$alat->gambar));
            }
        } else {
            unset($input['gambar']);
        }

        $alat->update($input);
        
        return redirect()->route('admin.dashboard')->with('success', 'Data peralatan berhasil diperbarui!');
    }

    /**
     * KUNCI FIX DELETE: Mencari 'id_alat', menghapus berkas gambarnya di folder public/images, 
     * lalu menghapus record barisnya dari database secara permanen.
     */
    public function destroy($id) {
        $alat = PeralatanLab::where('id_alat', $id)->firstOrFail();
        
        // Hapus file gambar fisik dari server agar storage tidak bengkak
        if($alat->gambar && file_exists(public_path('images/'.$alat->gambar))) {
            unlink(public_path('images/'.$alat->gambar));
        }
        
        $alat->delete();
        
        return redirect()->route('admin.dashboard')->with('success', 'Data peralatan berhasil dihapus!');
    }

    public function exportPdf() {
        $peralatan = PeralatanLab::all();
        $pdf = Pdf::loadView('admin.pdf', compact('peralatan'));
        return $pdf->download('laporan_peralatan_lab.pdf');
    }
}