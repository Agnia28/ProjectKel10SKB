<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\M_pamong;

use Illuminate\Http\Request;

class C_pamong extends Controller
{
    public function __construct()
    {
        $this->M_pamong = new M_pamong();
    }

    public function index(){
        $id_akun = session('user')['id_akun'] ?? null;
        $mapel = DB::table('tb_mapel')->select('id_mapel', 'mapel')->get();
        $mapelSaya = DB::table('tb_pamong')
        ->join('tb_mapel', 'tb_pamong.nip', '=', 'tb_mapel.nip')
        ->where('tb_pamong.id_akun', $id_akun)
        ->select('tb_mapel.mapel')
        ->get();
        $kelas = DB::table('tb_kelas')->select('id_kelas', 'kelas')->get();
        $kelasSaya = DB::table('tb_pamong')
        ->join('tb_kelas', 'tb_pamong.nip', '=', 'tb_kelas.nip')
        ->where('tb_pamong.id_akun', $id_akun)
        ->select('tb_kelas.kelas')
        ->get();
        return view('pamong.v_pamonghome', compact('mapelSaya', 'mapel', 'id_akun', 'kelas', 'kelasSaya'));
    }

    public function indexmateri(){
        $id_akun = session('user')['id_akun'] ?? null;
        $id_pamong = DB::table('tb_pamong')->where('id_akun', '=', $id_akun)
        ->value('nip');
        $kelas = DB::table('tb_kelas')->select('id_kelas', 'kelas')->get();
        $mapel = DB::table('tb_mapel')->select('id_mapel', 'mapel')->get();
        $dataMateri = DB::table('tb_materi')
        ->leftjoin('tb_kelas', 'tb_materi.id_kelas', '=', 'tb_kelas.id_kelas')
        ->leftjoin('tb_mapel', 'tb_materi.id_mapel', '=', 'tb_mapel.id_mapel')
        ->where('tb_kelas.nip', '=', $id_pamong)
        ->where('tb_mapel.nip', '=', $id_pamong)
        ->select('tb_materi.*', 'tb_mapel.mapel', 'tb_kelas.kelas')
        ->get();
        return view('pamong.v_tabelmateri', compact('id_akun', 'id_pamong', 'kelas', 'mapel', 'dataMateri'));
    }

    public function formtambah(){
        $id_akun = session('user')['id_akun'] ?? null;
        $id_pamong = DB::table('tb_pamong')->where('id_akun', '=', $id_akun)
        ->value('nip');
        $kelas = DB::table('tb_kelas')->select('id_kelas', 'kelas')->get();
        $mapel = DB::table('tb_mapel')->select('id_mapel', 'mapel')->get();
        $dataMateri = DB::table('tb_materi')
        ->leftjoin('tb_kelas', 'tb_materi.id_kelas', '=', 'tb_kelas.id_kelas')
        ->leftjoin('tb_mapel', 'tb_materi.id_mapel', '=', 'tb_mapel.id_mapel')
        ->where('tb_kelas.nip', '=', $id_pamong)
        ->where('tb_mapel.nip', '=', $id_pamong)
        ->select('tb_materi.*', 'tb_mapel.mapel', 'tb_kelas.kelas')
        ->get();
        return view('pamong.v_tambahmateri', compact('id_akun', 'id_pamong', 'kelas', 'mapel', 'dataMateri'));
    }

    public function tambahmateri(Request $request)
    {
        $request->validate([
            'nama_materi' => 'required|string|required',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            'keterangan_materi' => 'required',
            'file' => 'file|max:10240',
        ]);
            $lastmateri = DB::table('tb_materi')
            ->select('id_materi')
            ->orderByDesc('id_materi')
            ->first();

            if ($lastmateri) {
            $lastNummateri = (int) substr($lastmateri->id_materi, 1); // ambil angka setelah 'C'
            $idmateri = 'M' . str_pad($lastNummateri + 1, 4, '0', STR_PAD_LEFT);
            } else {
            $idmateri = 'M0001'; // Kalau belum ada data
            }

            if (Request()->file('file')) {
            $filemateri = Request()->file('file');
            $fileNamemateri = $filemateri->getClientOriginalName();
            $filemateri->move(public_path('materi'), $fileNamemateri);

            DB::table('tb_materi')->insert([
                'id_materi' => $idmateri,
                'nama_materi' => $request->nama_materi,
                'id_mapel'     => $request->id_mapel,
                'id_kelas'    => $request->id_kelas,
                'keterangan_materi' => $request->keterangan_materi,
                'file' => $fileNamemateri,
            ]);
            } else {
            DB::table('tb_materi')->insert([
                'id_materi' => $idmateri,
                'nama_materi' => $request->nama_materi,
                'id_mapel'     => $request->id_mapel,
                'id_kelas'    => $request->id_kelas,
                'keterangan_materi' => $request->keterangan_materi,
            ]);
            }

        return redirect('/pamong/tabelmateri')->with('success', 'Data Berhasil Ditambahkan.');
    }

    public function deletemateri($id_materi)
    {
        // Hapus atau delete foto
        $materi = $this->M_pamong->detailDatamateri($id_materi);
    
        $this->M_pamong->deleteDatamateri($id_materi);
        return redirect()->route('materi')->with('success', 'Data Berhasil Dihapus');
    }

    public function editmateri($id_materi)
    {
        if (!$this->M_pamong->detailDatamateri($id_materi)) {
            abort(404);
        }
        $kelas = DB::table('tb_kelas')->select('id_kelas', 'kelas')->get();
        $mapel = DB::table('tb_mapel')->select('id_mapel', 'mapel')->get();

        $data = [
            'materi' => $this->M_pamong->detailDatamateri($id_materi)
        ];
        return view('pamong.v_editmateri', $data, compact('kelas', 'mapel'));
    }

    public function updatemateri($id_materi)
    {
        Request()->validate([
            'id_materi' => 'required',
            'nama_materi' => 'required|min:5',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            'keterangan_materi' => 'required',
        ], [
            'nama_materi.required' => 'Nama Produk wajib di isi !',
            'nama_materi.min' => 'Nama Produk minimal 5 karakter',
        ]);

        if (Request()->file('file')) {
            $filemateri = Request()->file('file');
            $fileNamemateri = $filemateri->getClientOriginalName();
            $filemateri->move(public_path('materi'), $fileNamemateri);

            $data = [
                'id_materi' => Request()->id_materi,
                'nama_materi' => Request()->nama_materi,
                'id_mapel'     => Request()->id_mapel,
                'id_kelas'    => Request()->id_kelas,
                'keterangan_materi' => Request()->keterangan_materi,
                'file' => $fileNamemateri,
            ];
            } else {
            $data = [
                'id_materi' => Request()->id_materi,
                'nama_materi' => Request()->nama_materi,
                'id_mapel'     => Request()->id_mapel,
                'id_kelas'    => Request()->id_kelas,
                'keterangan_materi' => Request()->keterangan_materi,
            ];
            }
        $this->M_pamong->editDatamateri($id_materi, $data);
        
        return redirect()->route('materi')->with('pesan', 'Data berhasil diperbarui!');
    }

    public function formTugas()
{
    $mapel = DB::table('tb_mapel')->get();
    $kelas = DB::table('tb_kelas')->get();

    return view('pamong.tambahtugas', compact('mapel', 'kelas'));
}

public function tugas()
{
    $dataTugas = DB::table('tb_tugas')
        ->leftJoin('tb_mapel', 'tb_tugas.id_mapel', '=', 'tb_mapel.id_mapel')
        ->leftJoin('tb_kelas', 'tb_tugas.id_kelas', '=', 'tb_kelas.id_kelas')
        ->select('tb_tugas.*', 'tb_mapel.mapel as mapel', 'tb_kelas.kelas as kelas')
        ->get();

    return view('pamong.v_tugas', compact('dataTugas'));

    $fileName = null;
    if ($request->hasFile('file_tugas')) {
        $file = $request->file('file_tugas');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('tugas'), $fileName);
    }

    // Buat ID otomatis (bisa diganti dengan UUID atau autoincrement DB jika pakai Eloquent)
    $last = DB::table('tb_tugas')->latest('id_tugas')->first();
    $newId = $last ? 'T' . str_pad((int)substr($last->id_tugas, 1) + 1, 4, '0', STR_PAD_LEFT) : 'T0001';

    DB::table('tb_tugas')->insert([
        'id_tugas' => $newId,
        'judul_tugas' => $request->judul_tugas,
        'deskripsi' => $request->deskripsi,
        'id_mapel' => $request->id_mapel,
        'id_kelas' => $request->id_kelas,
        'file_tugas' => $fileName,
        'tanggal_deadline' => $request->tanggal_deadline,
    ]);

    return redirect()->route('form.tugas')->with('success', 'Tugas berhasil ditambahkan!');
}

}
