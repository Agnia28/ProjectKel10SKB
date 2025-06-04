<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class C_Login extends Controller
{
    public function index(){
        return view('masyarakat.v_index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Ambil data akun berdasarkan username
        $user = DB::table('tb_akun')->where('username', $request->username)->first();

        // Cek apakah username ditemukan
        if (!$user) {
            return back()->with('error', 'Username tidak ditemukan');
        }

        // Cek password
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password salah');
        }


        Session::put('user', [
            'id_akun' => $user->id_akun,
            'username' => $user->username,
            'tipe_akun' => $user->tipe_akun
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
        }
        


        if ($user->tipe_akun === 'admin') {
            return redirect('/admin')->with('success', 'Login berhasil sebagai Admin');
        } else if ($user->tipe_akun === 'pamong'){
            return redirect('/pamong')->with('success', 'Login berhasil sebagai Pamong Belajar');
        } else if ($user->tipe_akun === 'peserta') {
            return redirect('/pesertadidik')->with('success', 'Login berhasil sebagai Peserta Didik');
        }
    }

    public function logout()
    {
        Session::forget('user');
        return redirect('/')->with('success', 'Logout berhasil');
    }

}


