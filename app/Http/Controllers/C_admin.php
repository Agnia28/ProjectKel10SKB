<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\M_admin;

class C_admin extends Controller
{
    public function __construct()
    {
        $this->M_admin = new M_admin();
    }

    public function index(){
        return view('admin.v_dashboard');
    }

    public function indexsiswa(){
        $kelas = DB::table('tb_kelas')->select('id_kelas', 'kelas')->get();
        $dataSiswa = DB::table('tb_siswa')
        ->join('tb_kelas', 'tb_siswa.id_kelas', '=', 'tb_kelas.id_kelas')
        ->select('tb_siswa.*', 'tb_kelas.kelas')
        ->get();
        return view('admin.v_tabelsiswa', compact('kelas', 'dataSiswa'));
    }
    
    public function indexpamong(){
        $datapamong = DB::table('tb_pamong')->get();
        return view('admin.v_tabelpamong', compact('datapamong'));
    }

    public function indexkelas(){
        $pamong = DB::table('tb_pamong')->select('nip', 'nama')->get();
        $datakelas = DB::table('tb_kelas')
        ->leftjoin('tb_pamong', 'tb_kelas.nip', '=', 'tb_pamong.nip')
        ->select('tb_kelas.*', 'tb_pamong.nama')
        ->get();
        return view('admin.v_tabelkelas', compact('datakelas', 'pamong'));
    }

    public function indexmapel(){
        $pamong = DB::table('tb_pamong')->select('nip', 'nama')->get();
        $datamapel = DB::table('tb_mapel')
        ->leftjoin('tb_pamong', 'tb_mapel.nip', '=', 'tb_pamong.nip')
        ->select('tb_mapel.*', 'tb_pamong.nama')
        ->get();
        return view('admin.v_tabelmapel', compact('datamapel', 'pamong'));
    }

    public function tambahsiswa(Request $request)
    {
        foreach ($request->siswa as $s) {
            DB::table('tb_siswa')->insert([
                'nis' => $s['no_induk'],
                'nama'     => $s['nama'],
                'jenis_kelamin'   => $s['gender'],
                'id_kelas'    => $s['kelas'],
            ]);

            $lastAkun = DB::table('tb_akun')
            ->select('id_akun')
            ->orderByDesc('id_akun')
            ->first();

            if ($lastAkun) {
            $lastNumakun = (int) substr($lastAkun->id_akun, 1); // ambil angka setelah 'C'
            $idAkun = 'A' . str_pad($lastNumakun + 1, 4, '0', STR_PAD_LEFT);
            } else {
            $idAkun = 'A0001'; // Kalau belum ada data
            }

            DB::table('tb_akun')->insert([
                'id_akun' => $idAkun,
                'username'     => $s['nama'],
                'password' => bcrypt($s['no_induk']),
                'tipe_akun' => 'siswa',
            ]);
        }

        return redirect('/admin/tabelsiswa')->with('success', 'Data Siswa Berhasil Ditambahkan.');
    }

    public function tambahmateri(Request $request)
    {
        foreach ($request->materi as $s) {
        $lastmateri = DB::table('tb_materi')
        ->select('id_materi')
        ->orderByDesc('id_materi')
        ->first();
    
        if ($lastmateri) {
        $lastNummateri = (int) substr($lastmateri->id_materi, 1); // ambil angka setelah 'C'
        $idmateri = 'N' . str_pad($lastNummateri + 1, 4, '0', STR_PAD_LEFT);
        } else {
        $idmateri = 'N0001'; // Kalau belum ada data
        }

            DB::table('tb_materi')->insert([
                'id_materi' => $idmateri,
                'nama_materi' => $s['nama_materi'],
                'id_mapel'     => $s['mapel'],
                'id_kelas'    => $s['kelas'],
            ]);


        }
        return redirect('/admin/tabelmateri')->with('success', 'Data Berhasil Ditambahkan.');
    }

    public function tambahpamong(Request $request)
    {
        foreach ($request->pamong as $s) {
            $lastAkun = DB::table('tb_akun')
            ->select('id_akun')
            ->orderByDesc('id_akun')
            ->first();

            if ($lastAkun) {
            $lastNumakun = (int) substr($lastAkun->id_akun, 1); // ambil angka setelah 'C'
            $idAkun = 'A' . str_pad($lastNumakun + 1, 4, '0', STR_PAD_LEFT);
            } else {
            $idAkun = 'A0001'; // Kalau belum ada data
            }

            DB::table('tb_akun')->insert([
                'id_akun' => $idAkun,
                'username'     => $s['nama'],
                'password' => bcrypt($s['nip']),
                'tipe_akun' => 'pamong',
            ]);

            DB::table('tb_pamong')->insert([
                'nip' => $s['nip'],
                'nama'     => $s['nama'],
                'jenis_kelamin'   => $s['gender'],
                'id_akun' => $idAkun,
            ]);


        }

        return redirect('/admin/tabelpamong')->with('success', 'Data Pamong Berhasil Ditambahkan.');
    }

    public function tambahkelas(Request $request)
    {
        foreach ($request->kelas as $s) {
        $lastAkun = DB::table('tb_kelas')
            ->select('id_kelas')
            ->orderByDesc('id_kelas')
            ->first();

            if ($lastAkun) {
            $lastNumakun = (int) substr($lastAkun->id_kelas, 1); // ambil angka setelah 'C'
            $idkelas = 'K' . str_pad($lastNumakun + 1, 4, '0', STR_PAD_LEFT);
            } else {
            $idkelas = 'K0001'; // Kalau belum ada data
            }

            DB::table('tb_kelas')->insert([
                'id_kelas' => $idkelas,
                'kelas'     => $s['kelas'],
            ]);
        }
        return redirect('/admin/tabelkelas')->with('success', 'Data Kelas Berhasil Ditambahkan.');
    }

    public function tambahmapel(Request $request)
    {
        foreach ($request->mapel as $s) {
        $lastAkun = DB::table('tb_mapel')
            ->select('id_mapel')
            ->orderByDesc('id_mapel')
            ->first();

            if ($lastAkun) {
            $lastNumakun = (int) substr($lastAkun->id_mapel, 1); // ambil angka setelah 'C'
            $idmapel = 'M' . str_pad($lastNumakun + 1, 4, '0', STR_PAD_LEFT);
            } else {
            $idmapel = 'M0001'; // Kalau belum ada data
            }

            DB::table('tb_mapel')->insert([
                'id_mapel' => $idmapel,
                'mapel'     => $s['mapel'],
            ]);
        }
        return redirect('/admin/tabelmapel')->with('success', 'Data mapel Berhasil Ditambahkan.');
    }

    public function editsiswa($nis)
    {
        if (!$this->M_admin->detailDatasiswa($nis)) {
            abort(404);
        }
        $kelas = DB::table('tb_kelas')->select('id_kelas', 'kelas')->get();

        $data = [
            'siswa' => $this->M_admin->detailDatasiswa($nis)
        ];
        return view('admin.v_editsiswa', $data, compact('kelas'));
    }

    public function editpamong($nip)
    {
        if (!$this->M_admin->detailDatapamong($nip)) {
            abort(404);
        }
        $kelas = DB::table('tb_kelas')->select('id_kelas', 'kelas')->get();
        $mapel = DB::table('tb_mapel')->select('id_mapel', 'mapel')->get();

        $data = [
            'pamong' => $this->M_admin->detailDatapamong($nip)
        ];
        return view('admin.v_editpamong', $data, compact('kelas', 'mapel'));
    }

    public function editmapel($id_mapel)
    {
        if (!$this->M_admin->detailDatamapel($id_mapel)) {
            abort(404);
        }
        $pamong = DB::table('tb_pamong')->select('nip', 'nama')->get();

        $data = [
            'mapel' => $this->M_admin->detailDatamapel($id_mapel)
        ];
        return view('admin.v_editmapel', $data, compact('pamong'));
    }

    public function editkelas($id_kelas)
    {
        if (!$this->M_admin->detailDatakelas($id_kelas)) {
            abort(404);
        }
        $pamong = DB::table('tb_pamong')->select('nip', 'nama')->get();

        $data = [
            'kelas' => $this->M_admin->detailDatakelas($id_kelas)
        ];
        return view('admin.v_editkelas', $data, compact('pamong'));
    }


    public function updatesiswa($nis)
    {
        Request()->validate([
            'nis' => 'required',
            'nama' => 'required|min:5',
            'jenis_kelamin' => 'required',
            'id_kelas' => 'required',
        ], [
            'nama.required' => 'Nama Produk wajib di isi !',
            'nama.min' => 'Nama Produk minimal 5 karakter',
            'jenis_kelamin.required' => 'jenis_kelamin Produk wajib di isi !',
        ]);

        $data = [
            'nis' => Request()->nis,
            'nama' => Request()->nama,
            'jenis_kelamin' => Request()->jenis_kelamin,
            'id_kelas' => Request()->id_kelas,
        ];

        $this->M_admin->editDatasiswa($nis, $data);
        
        return redirect()->route('siswa')->with('pesan', 'Data berhasil diperbarui!');
    }

    public function updatemapel($id_mapel)
    {
        Request()->validate([
            'id_mapel' => 'required',
            'mapel' => 'required|min:5',
        ], [
            'mapel.required' => 'Nama Produk wajib di isi !',
            'mapel.min' => 'Nama Produk minimal 5 karakter',
        ]);

        $data = [
            'id_mapel' => Request()->id_mapel,
            'mapel' => Request()->mapel,
            'nip' => Request()->id_pamong,
        ];
        $this->M_admin->editDatamapel($id_mapel, $data);
        
        return redirect()->route('mapel')->with('pesan', 'Data berhasil diperbarui!');
    }

        public function updatekelas($id_kelas)
        {
            Request()->validate([
                'id_kelas' => 'required',
                'kelas' => 'required|min:5',
            ], [
                'kelas.required' => 'Nama Produk wajib di isi !',
                'kelas.min' => 'Nama Produk minimal 5 karakter',
            ]);
    
            $data = [
                'id_kelas' => Request()->id_kelas,
                'kelas' => Request()->kelas,
                'nip' => Request()->id_pamong,
            ];

        $this->M_admin->editDatakelas($id_kelas, $data);
        
        return redirect()->route('kelas')->with('pesan', 'Data berhasil diperbarui!');
    }

        public function updatepamong($nip)
    {
        Request()->validate([
            'nip' => 'required',
            'nama' => 'required|min:5',
            'jenis_kelamin' => 'required',
        ], [
            'nama.required' => 'Nama Produk wajib di isi !',
            'nama.min' => 'Nama Produk minimal 5 karakter',
            'jenis_kelamin.required' => 'jenis_kelamin Produk wajib di isi !',
        ]);

        $data = [
            'nip' => Request()->nip,
            'nama' => Request()->nama,
            'jenis_kelamin' => Request()->jenis_kelamin,
        ];

        $this->M_admin->editDatapamong($nip, $data);
        
        return redirect()->route('pamong')->with('pesan', 'Data berhasil diperbarui!');
    }


    public function deletesiswa($nis)
    {
        // Hapus atau delete foto
        $siswa = $this->M_admin->detailDatasiswa($nis);
    
        $this->M_admin->deleteDatasiswa($nis);
        return redirect()->route('siswa')->with('success', 'Data Berhasil Dihapus');
    }

    public function deletepamong($nip)
    {
        // Hapus atau delete foto
        $pamong = $this->M_admin->detailDatapamong($nip);
    
        $this->M_admin->deleteDatapamong($nip);
        return redirect()->route('pamong')->with('success', 'Data Berhasil Dihapus');
    }

    public function deletekelas($id_kelas)
    {
        // Hapus atau delete foto
        $kelas = $this->M_admin->detailDatakelas($id_kelas);
    
        $this->M_admin->deleteDatakelas($id_kelas);
        return redirect()->route('kelas')->with('success', 'Data Berhasil Dihapus');
    }

    public function deletemapel($id_mapel)
    {
        // Hapus atau delete foto
        $mapel = $this->M_admin->detailDatamapel($id_mapel);
    
        $this->M_admin->deleteDatamapel($id_mapel);
        return redirect()->route('mapel')->with('success', 'Data Berhasil Dihapus');
    }
}
