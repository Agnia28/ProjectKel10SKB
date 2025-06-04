<?php

namespace App\Http\Controllers;

use App\Models\M_Pamongbelajar;
use Illuminate\Http\Request;

class C_Pamongbelajar extends Controller
{
    public function __construct()
    {
        $this->M_Pamongbelajar = new M_Pamongbelajar();
    }
 
    public function index(){
        $data = [
            'pamongbelajar' => $this->M_Pamongbelajar->allData(),
        ];
        return view('pamongbelajar.v_pamongbelajar', $data);
    }

    public function materi(){
        $data = [
            'pamongbelajar' => $this->M_Pamongbelajar->allDatamateri(),
        ];
        return view('pamongbelajar.v_pamongmateri', $data);
    }
 
    public function detail($id_pamongbelajar)
    {
        if (!$this->M_Pamongbelajar->detailData($id_pamongbelajar)) {
            abort(404);
        }
        $data = ['pamongbelajar' => $this->M_Pamongbelajar->detailData($id_pamongbelajar)
        ];
        return view('pamongbelajar.v_detailpamongbelajar', $data);
    }
 
    public function add()
    {
        return view('pamongbelajar.v_addpamongbelajar');
    }
 
    public function insert()
    {
        Request()->validate([
            'id_pamongbelajar' => 'required|max:20',
            'nip' => 'required|unique:tb_pamongbelajar,nip|min:17|max:18',
            'nama_pamongbelajar' => 'required',
            'mata_pelajaran' => 'required',
            'foto_pamongbelajar' => 'required|mimes:jpg,jpeg,png,bmp|max:1024',
        ],[// Ubah konversi keterangan validasi form NIP dalam bahasa Indonesia
            'id_pamongbelajar' => 'ID Wajib di isi',
            'nip.required' => 'NIP wajib di isi !',
            'nip.unique' => 'NIP ini sudah terdaftar di database !',
            'nip.min' => 'NIP minimal 17 karakter',
            'nip.max' => 'NIP maksimal 18 karakter',
            'nama_pamongbelajar.required' => 'Nama Pamong Belajar wajib di isi !',
            'mata_pelajaran.required' => 'Nama Mata Pelajaran wajib di isi !',
            'foto_pamongbelajar.required' => 'Foto Pamong Belajar wajib di isi !',
        ]);
        // Jika validasi tidak ada maka lakukan simpan data
        // Upload gambar/foto
        $file = Request()->foto_pamongbelajar;
        $fileName = Request()->nip . '.' . $file->extension();
        $file->move(public_path('foto_pamongbelajar'), $fileName);
 
        $data = [
            'id_pamongbelajar' => Request()->id_pamongbelajar,
            'nip' => Request()->nip,
            'nama_pamongbelajar' => Request()->nama_pamongbelajar,
            'mata_pelajaran' => Request()->mata_pelajaran,
            'foto_pamongbelajar' => $fileName,
        ];
        $this->M_Pamongbelajar->addData($data);
        return redirect()->route('pamongbelajar')->with('pesan', 'Data berhasil ditambahkan !');
    }
 
    public function edit($id_pamongbelajar)
    {
        if(!$this->M_Pamongbelajar->detailData($id_pamongbelajar)) {
            abort(404);
        }
 
        $data = ['pamongbelajar' => $this->M_Pamongbelajar->detailData($id_pamongbelajar)
    ];
        return view('pamongbelajar.v_editpamongbelajar', $data);
    }
 
    public function update($id_pamongbelajar)
    {
        Request()->validate([
            'nip' => 'required|min:17|max:18',
            'nama_pamongbelajar' => 'required',
            'mata_pelajaran' => 'required',
            'foto_pamongbelajar' => 'mimes:jpg,jpeg,png,bmp|max:1024',
        ],[// Ubah konversi keterangan validasi form NIP dalam bahasa Indonesia
            'nip.required' => 'NIP wajib di isi !',
            'nip.min' => 'NIP minimal 17 karakter',
            'nip.max' => 'NIP maksimal 18 karakter',
            'nama_pamongbelajar.required' => 'Nama Pamong Belajar wajib di isi !',
            'mata_pelajaran.required' => 'Nama Mata Pelajaran wajib di isi !',
            'foto_pamongbelajar.required' => 'Foto Pamong Belajar wajib di isi !',
        ]);
        // Jika validasi tidak ada maka lakukan simpan data
        if (Request()->foto_pamongbelajar) {
            // Upload gambar/foto
            $file = Request()->foto_pamongbelajar;
            $fileName = Request()->nip . '.' . $file->extension();
            $file->move(public_path('foto_pamongbelajar'), $fileName);
 
            $data = [
                'nip' => Request()->nip,
                'nama_pamongbelajar' => Request()->nama_pamongbelajar,
                'mata_pelajaran' => Request()->mata_pelajaran,
                'foto_pamongbelajar' => $fileName,
            ];
            $this->M_Pamongbelajar->editData($id_pamongbelajar, $data);
        }
        else {
            // Jika tidak ganti gambar/foto
            $data = [
                'nip' => Request()->nip,
                'nama_pamongbelajar' => Request()->nama_pamongbelajar,
                'mata_pelajaran' => Request()->mata_pelajaran,
            ];
            $this->M_Pamongbelajar->editData($id_pamongbelajar, $data);
        }
 
        return redirect()->route('pamongbelajar')->with('pesan', 'Data berhasil diupdate !');
    }
 
    public function delete($id_pamongbelajar)
    {
        // Hapus atau delete foto
        $pamongbelajar = $this->M_Pamongbelajar->detailData($id_pamongbelajar);
        if ($pamongbelajar->foto_pamongbelajar <> "") {
            unlink(public_path('foto_pamongbelajar') . '/' . $pamongbelajar->foto_pamongbelajar);
        }
        $this->M_Pamongbelajar->deleteData($id_pamongbelajar);
        return redirect()->route('pamongbelajar')->with('pesan', 'Data berhasil dihapus !');
    }
}
