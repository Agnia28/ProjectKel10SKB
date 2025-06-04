<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_kelolaformulirpaud;

class C_kelolaformulirpaud extends Controller
{
    public function index() {
        $data = M_kelolaformulirpaud::all();
        return view('admin.v_kelola_formulir_paud', compact('data'));
    }

    public function show($id_paud) {
        $data = M_kelolaformulirpaud::findOrFail($id_paud);
        return view('admin.v_detail_pendaftaran_paud', compact('data'));
    }

    public function edit($id_paud) {
        $item = M_kelolaformulirpaud::findOrFail($id_paud);
        return view('admin.v_edit_formulir_pendaftaran_paud', compact('item'));
    }

    public function update(Request $request, $id_paud) {
        $item = M_kelolaformulirpaud::findOrFail($id_paud);
        $item->update($request->all());
        return redirect()->route('kelola.formulirpaud')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete($id_paud) {
        $item = M_kelolaformulirpaud::findOrFail($id_paud);
        $item->delete();
        return redirect()->route('kelola.formulirpaud')->with('success', 'Data berhasil dihapus.');
    }
}
