<?php

namespace App\Http\Controllers;

use App\Models\HewanPeliharaan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HewanPeliharaanController extends Controller
{
    public function publicIndex() {
        $hewan = HewanPeliharaan::all();
        return view('data-hewan', compact('hewan'));
    }

    /**
     * Halaman Index Utama Admin (Gerbang Awal)
     */
    public function index() {
        return view('admin.index');
    }

    /**
     * Halaman Dashboard Admin
     */
    public function dashboard() {
        $hewan = HewanPeliharaan::latest()->get();
        return view('admin.dashboard', compact('hewan'));
    }

    public function create() {
        return view('admin.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_hewan'  => 'required|string|max:255',
            'jenis'       => 'required|string|max:255',
            'usia'        => 'required|integer', 
            'pemilik'     => 'required|string|max:255',
            'ras_spesies' => 'required|string|max:255',
            'gambar'      => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $input = $request->all();
        if ($image = $request->file('gambar')) {
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            
            if (config('app.env') === 'production' || env('VERCEL') == '1') {
                $input['gambar'] = $profileImage;
            } else {
                $destinationPath = public_path('images/');
                $image->move($destinationPath, $profileImage);
                $input['gambar'] = "$profileImage";
            }
        }

        HewanPeliharaan::create($input);
        
        return redirect()->route('admin.dashboard')->with('success', 'Data hewan peliharaan berhasil ditambahkan!');
    }

    /**
     * MENSESUAIKAN: Mengubah parameter $id menjadi $id_hewan agar klop dengan rute
     */
    public function edit($id_hewan) {
        $hewan = HewanPeliharaan::where('id_hewan', $id_hewan)->firstOrFail();
        return view('admin.edit', compact('hewan'));
    }

    /**
     * MENSESUAIKAN: Mengubah parameter $id menjadi $id_hewan
     */
    public function update(Request $request, $id_hewan) {
        $request->validate([
            'nama_hewan'  => 'required|string|max:255',
            'jenis'       => 'required|string|max:255',
            'usia'        => 'required|integer',
            'pemilik'     => 'required|string|max:255',
            'ras_spesies' => 'required|string|max:255',
            'gambar'      => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $hewan = HewanPeliharaan::where('id_hewan', $id_hewan)->firstOrFail();
        $input = $request->all();

        if ($image = $request->file('gambar')) {
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            
            if (config('app.env') === 'production' || env('VERCEL') == '1') {
                $input['gambar'] = $profileImage;
            } else {
                $destinationPath = public_path('images/');
                $image->move($destinationPath, $profileImage);
                $input['gambar'] = "$profileImage";
                
                if($hewan->gambar && file_exists(public_path('images/'.$hewan->gambar))) {
                    @unlink(public_path('images/'.$hewan->gambar));
                }
            }
        } else {
            unset($input['gambar']);
        }

        $hewan->update($input);
        
        return redirect()->route('admin.dashboard')->with('success', 'Data hewan berhasil diperbarui!');
    }

    /**
     * MENSESUAIKAN: Mengubah parameter $id menjadi $id_hewan
     */
    public function destroy($id_hewan) {
        $hewan = HewanPeliharaan::where('id_hewan', $id_hewan)->firstOrFail();
        
        if (config('app.env') !== 'production' && env('VERCEL') != '1') {
            if($hewan->gambar && file_exists(public_path('images/'.$hewan->gambar))) {
                @unlink(public_path('images/'.$hewan->gambar));
            }
        }
        
        $hewan->delete();
        
        return redirect()->route('admin.dashboard')->with('success', 'Data hewan berhasil dihapus!');
    }

    public function exportPdf() {
        $hewan = HewanPeliharaan::all();
        $pdf = Pdf::loadView('admin.pdf', compact('hewan'));
        return $pdf->download('laporan_data_hewan.pdf');
    }
}