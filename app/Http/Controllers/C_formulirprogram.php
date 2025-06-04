<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_formulirprogram;

class C_formulirprogram extends Controller
{
    public function create()
    {
        return view('masyarakat.v_formprogramskb');
     }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nisn' => 'required|int',
            'nik' => 'required|int',
            'tempat_tanggal_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'dusun' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'nama_ayah' => 'required',
            'nik_ayah' => 'required|int',
            'tahun_lahir_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'nama_ibu' => 'required',
            'nik_ibu' => 'required|int',
            'tahun_lahir_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required',
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
            'jarak_ke_skb' => 'required',
            'waktu_tempuh' => 'required',
            'anak_ke' => 'required|int',
            'jumlah_saudara' => 'required|int',
            'prestasi' => 'required',
            'paket' => 'required|in:A,B,C',
        ]);

        M_formulirprogram::create($request->all());

        return redirect()->back()->with('success', 'Pendaftaran berhasil disimpan!');
    }
}
