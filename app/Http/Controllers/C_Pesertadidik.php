<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Pesertadidik;
use Illuminate\Support\Facades\DB;

class C_Pesertadidik extends Controller
{
    public function __construct()
    {
        $this->M_Pesertadidik = new M_Pesertadidik();
    }

    public function index()
    {
        $data = [
            'pesertadidik' => $this->M_Pesertadidik->allData(),
        ];
        return view('v_pesertadidik', $data);
    }

    public function detail($nisn)
    {
        if (!$this->M_Pesertadidik->detailData($nisn)) {
            abort(404);
        }
        $data = [
            'pesertadidik' => $this->M_Pesertadidik->detailData($nisn)
        ];
        return view('v_detailpesertadidik', $data);
    }

    public function add()
    {
        return view('v_addpesertadidik');
    }

    public function insert()
    {
        Request()->validate([
            'nisn' => 'required|unique:peserta_didik,nisn|min:10|max:10',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'program' => 'required',
            'nomor_handphone' => 'required',
            'fotopesertadidik' => 'required|image|mimes:jpg,jpeg,png,bmp|max:1024',
        ], [
            'nisn.required' => 'NISN wajib diisi!',
            'nisn.unique' => 'NISN sudah terdaftar!',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi!',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi!',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi!',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi!',
            'alamat.required' => 'Alamat wajib diisi!',
            'agama.required' => 'Agama wajib diisi!',
            'program.required' => 'Program wajib diisi!',
            'nomor_handphone.required' => 'Nomor HP wajib diisi!',
            'fotopesertadidik.required' => 'Foto wajib diunggah!',
        ]);

        $file = Request()->file('fotopesertadidik');
        $fileName = Request()->nisn . '.' . $file->extension();
        $file->move(public_path('foto_pesertadidik'), $fileName);

        $data = [
            'nisn' => Request()->nisn,
            'nama_lengkap' => Request()->nama_lengkap,
            'tempat_lahir' => Request()->tempat_lahir,
            'tanggal_lahir' => Request()->tanggal_lahir,
            'jenis_kelamin' => Request()->jenis_kelamin,
            'alamat' => Request()->alamat,
            'agama' => Request()->agama,
            'program' => Request()->program,
            'nomor_handphone' => Request()->nomor_handphone,
            'fotopesertadidik' => $fileName,
        ];

        DB::table('peserta_didik')->insert($data);
        return redirect()->route('pesertadidik')->with('pesan', 'Data berhasil ditambahkan!');
    }

    public function edit($nisn)
    {
        if (!$this->M_Pesertadidik->detailData($nisn)) {
            abort(404);
        }

        $data = ['pesertadidik' => $this->M_Pesertadidik->detailData($nisn)];
        return view('v_editpesertadidik', $data);
    }

    public function update($nisn)
    {
        Request()->validate([
            'nisn' => 'required',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'program' => 'required',
            'nomor_handphone' => 'required',
            'fotopesertadidik' => 'image|mimes:jpg,jpeg,png,bmp|max:1024',
        ]);

        if (Request()->fotopesertadidik) {
            // Upload gambar/foto
            $file = Request()->fotopesertadidik;
            $fileName = Request()->nisn . '.' . $file->extension();
            $file->move(public_path('foto_pesertadidik'), $fileName);
 
            $data = [
                'nisn' => Request()->nisn,
                'nama_lengkap' => Request()->nama_lengkap,
                'tempat_lahir' => Request()->tempat_lahir,
                'tanggal_lahir' => Request()->tanggal_lahir,
                'jenis_kelamin' => Request()->jenis_kelamin,
                'alamat' => Request()->alamat,
                'agama' => Request()->agama,
                'program' => Request()->program,
                'nomor_handphone' => Request()->nomor_handphone,
                'fotopesertadidik' => $fileName,
            ];
            DB::table('peserta_didik')->where('nisn', $nisn)->update($data);
        }
        else {
            // Jika tidak ganti gambar/foto
            $data = [
                'nisn' => Request()->nisn,
                'nama_lengkap' => Request()->nama_lengkap,
                'tempat_lahir' => Request()->tempat_lahir,
                'tanggal_lahir' => Request()->tanggal_lahir,
                'jenis_kelamin' => Request()->jenis_kelamin,
                'alamat' => Request()->alamat,
                'agama' => Request()->agama,
                'program' => Request()->program,
                'nomor_handphone' => Request()->nomor_handphone,
            ];
            DB::table('peserta_didik')->where('nisn', $nisn)->update($data);
        }
 
        return redirect()->route('pesertadidik')->with('pesan', 'Data berhasil diupdate !');
    }

    public function delete($nisn)
    {
        $peserta = $this->M_Pesertadidik->detailData($nisn);
        if ($peserta->fotopesertadidik != "") {
            unlink(public_path('foto_pesertadidik') . '/' . $peserta->fotopesertadidik);
        }
        $this->M_Pesertadidik->deleteData($nisn);
        return redirect()->route('pesertadidik')->with('pesan', 'Data berhasil dihapus!');
    }
}
