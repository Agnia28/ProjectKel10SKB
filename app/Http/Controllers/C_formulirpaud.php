<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_formulirpaud;

class C_formulirpaud extends Controller
{
    /**
     * Tampilkan form pendaftaran PAUD
     */

    public function create()
    {
        return view('masyarakat.v_formpaudskb');
    }

    /**
     * Simpan data ke database
     */
     public function store(Request $request)
    {
        $request->validate([
            // === Validasi Data Anak Didik ===
            'nama_lengkap' => 'required|string|max:255',
            'nama_panggilan' => 'nullable|string|max:255',
            'nik' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_tanggal_lahir' => 'required|string|max:100',
            'agama' => 'required|string|max:50',
            'kewarganegaraan' => 'required|string|max:50',
            'anak_ke' => 'required|integer',
            'jumlah_saudara' => 'required|integer',
            'berat_badan' => 'required|string|max:10',
            'tinggi_badan' => 'required|string|max:10',
            'golongan_darah' => 'nullable|string|max:5',
            'penyakit_pernah_diderita' => 'nullable|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'jarak_tempat_tinggal' => 'nullable|string|max:100',

            // === Validasi Data Ayah ===
            'nama_ayah' => 'nullable|string|max:255',
            'pendidikan_ayah' => 'nullable|string|max:100',
            'pekerjaan_ayah' => 'nullable|string|max:100',
            'penghasilan_ayah' => 'nullable|string|max:100',

            // === Validasi Data Ibu ===
            'nama_ibu' => 'nullable|string|max:255',
            'pendidikan_ibu' => 'nullable|string|max:100',
            'pekerjaan_ibu' => 'nullable|string|max:100',
            'penghasilan_ibu' => 'nullable|string|max:100',

            // === Validasi Data Wali ===
            'nama_wali' => 'nullable|string|max:255',
            'pendidikan_wali' => 'nullable|string|max:100',
            'hubungan_keluarga' => 'nullable|string|max:100',
            'pekerjaan_wali' => 'nullable|string|max:100',

            // === Validasi Asal Masuk PAUD ===
            'status_masuk' => 'nullable|in:Baru,Pindahan',
            'asal_paud' => 'nullable|string|max:255',
            'tanggal_pindah' => 'nullable|date',
            'tanggal_diterima' => 'nullable|date',
            'di_kelompok' => 'nullable|string|max:2',
        ]);

        M_formulirpaud::create($request->all());

        return redirect()->back()->with('success', 'Pendaftaran PAUD berhasil disimpan!');
    }
}
