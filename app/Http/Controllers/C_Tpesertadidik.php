<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class C_Tpesertadidik extends Controller
{
    // Dashboard Peserta Didik
    public function index()
    {
        $user = Session::get('user');
        return view('pesertadidik.v_pesertadidik', compact('user'));
    }

    // Materi untuk peserta didik
    public function materi()
{
    $dataMateri = DB::table('tb_materi')
        ->join('tb_mapel', 'tb_materi.id_mapel', '=', 'tb_mapel.id_mapel')
        ->join('tb_kelas', 'tb_materi.id_kelas', '=', 'tb_kelas.id_kelas')
        ->select(
            'tb_mapel.mapel',
            'tb_kelas.kelas',
            'tb_materi.nama_materi',
            'tb_materi.keterangan_materi',
            'tb_materi.file'
        )
        ->orderBy('tb_mapel.mapel')
        ->get()
        ->groupBy('mapel'); // ✅ Kelompok berdasarkan mapel

    return view('pesertadidik.v_materipesertadidik', compact('dataMateri'));
}

    // Tugas untuk peserta didik
    public function tugas()
{
    $nis = Session::get('user')['id_akun'];
    $kelas = DB::table('tb_siswa')->where('nis', $nis)->value('id_kelas');

    $dataTugas = DB::table('tb_tugas')
                ->join('tb_mapel', 'tb_tugas.id_mapel', '=', 'tb_mapel.id_mapel')
                ->where('tb_tugas.id_kelas', $kelas)
                ->select('tb_tugas.*', 'tb_mapel.mapel')
                ->get();

    return view('pesertadidik.v_tugaspesertadidik', compact('dataTugas'));
}


    // Ujian untuk peserta didik
    public function ujian()
    {
        $nis = Session::get('user')['id_akun'];
        $kelas = DB::table('tb_siswa')->where('nis', $nis)->value('id_kelas');

        $ujian = DB::table('tb_ujian')
                    ->join('tb_mapel', 'tb_ujian.id_mapel', '=', 'tb_mapel.id_mapel')
                    ->where('tb_ujian.id_kelas', $kelas)
                    ->select('tb_ujian.*', 'tb_mapel.mapel')
                    ->get();

        return view('peserta.ujian', compact('ujian'));
    }
}
