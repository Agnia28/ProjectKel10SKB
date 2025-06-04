<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_kelolaformulirprogram;

class C_kelolaformulirprogram extends Controller
{
    public function index() {
        $data = M_kelolaformulirprogram::all();
        return view('admin.v_kelola_formulir_pendaftaran', compact('data'));
    }

    public function show($id_daftarprogram) {
        $item = M_kelolaformulirprogram::findOrFail($id_daftarprogram);
        return view('admin.v_detail_pendaftaran_program', compact('item'));
    }

    public function edit($id_daftarprogram) {
        $item = M_kelolaformulirprogram::findOrFail($id_daftarprogram);
        return view('admin.v_edit_formulir_pendaftaran_program', compact('item'));
    }

    public function update(Request $request, $id_daftarprogram) {
        $item = M_kelolaformulirprogram::findOrFail($id_daftarprogram);
        $item->update($request->all());
        return redirect()->route('kelola.formulirprogram')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete($id_daftarprogram) {
        $item = M_kelolaformulirprogram::findOrFail($id_daftarprogram);
        $item->delete();
        return redirect()->route('kelola.formulirprogram')->with('success', 'Data berhasil dihapus.');
    }
}
