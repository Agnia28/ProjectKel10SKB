<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_pamong;
use App\Http\Controllers\C_Pesertadidik;
use App\Http\Controllers\C_Home;
use App\Http\Controllers\C_User;
use App\Http\Controllers\C_admin;
use App\Http\Controllers\C_Register;
use App\Http\Controllers\C_Login;
use App\Http\Controllers\C_formulirprogram;
use App\Http\Controllers\C_kelolaformulirprogram;
use App\Http\Controllers\C_formulirpaud;
use App\Http\Controllers\C_Tpesertadidik;



// Route::get('/', function () {
//     return view('welcome');
// });

// Route :: view('/contact','contact');

// Route :: view('/contact','contact',[
// 'name' => 'syifa nazwa aulia',
// 'email' => 'syifana@gmail.com']);

// Route::get('/contact', function () {
//     return view('contact', ['name'=> 'Syifa Nazwa Aulia','email'=>'syifana@gmail.com']);
// });

// Route::get('/about', function () {
//     return ('Halaman About');
// });

// Route :: view('/admin', 'admin/admin');
// Route :: view('/admin', 'admin.admin');

// Route::get('/mahasiswa/', function ($nama_mahasiswa='Syifa Nazwa Aulia') {
//     return view('mahasiswa',['nama_mahasiswa'=>$nama_mahasiswa]);
// });

// Route::view('/about','about',[
// 'nama' => 'Syifa Nazwa Aulia',
// 'alamat' => 'Subang, Subang'
// ]);

// Route::get('/',Function() {
//     return view('v_home');
// });

// Route::get('/', function () {
//     return view('v_index');
// });

Route::view('/pamongbelajar','v_pamongbelajar');
Route::view('/about','v_about');
Route::view('/contact','v_contact');
Route::view('/login','v_login');
Route::view('/barang','v_barang');
Route::view('/','v_index');
Route::view('/admin/tabelsiswa','admin.v_tabelsiswa');
Route::view('/pesertadidik','v_pesertadidik');

Route::get('/home',[C_Home::class,'index']);
Route::get('/home/about/{id}',[C_Home::class,'about']);
Route::get('/user',[C_User::class,'index']);
Route::get('/register',[C_Register::class,'index']);
Route::get('/',[C_Login::class,'index']);
Route::get('login',[C_Login::class,'tampilanlogin']);


Route::get('/pamongbelajar',[C_Pamongbelajar::class,'index'])->name('pamongbelajar');
Route::get('/pamongbelajar/materi',[C_Pamongbelajar::class,'materi'])->name('pamongmateri');
Route::get('/pamongbelajar/detail/{id_pamongbelajar}',[C_Pamongbelajar::class,'detail']);
Route::get('/pamongbelajar/edit/{id_pamongbelajar}',[C_Pamongbelajar::class,'edit']);
Route::post('/pamongbelajar/update/{id_pamongbelajar}', [C_Pamongbelajar::class, 'update']);
Route::get('/pamongbelajar/delete/{id_pamongbelajar}', [C_Pamongbelajar::class, 'delete']);
Route::get('/pamongbelajar/add', [C_Pamongbelajar::class, 'add']);
Route::post('/pamongbelajar/insert', [C_Pamongbelajar::class, 'insert']);

Route::get('/pesertadidik', [C_Pesertadidik::class, 'index'])->name('pesertadidik');
Route::get('/pesertadidik/detail/{nisn}', [C_Pesertadidik::class, 'detail']);
Route::get('/pesertadidik/add', [C_Pesertadidik::class, 'add'])->name('addpeserta');
Route::post('/pesertadidik/add', [C_Pesertadidik::class, 'insert']);
Route::get('/pesertadidik/edit/{nisn}', [C_Pesertadidik::class, 'edit']);
Route::post('/pesertadidik/update/{nisn}', [C_Pesertadidik::class, 'update']);
Route::get('/pesertadidik/delete/{nisn}', [C_Pesertadidik::class, 'delete']);

Route::get('/admin',[C_admin::class,'index'])->name('dashboard');
Route::get('/admin/tabelsiswa',[C_admin::class,'indexsiswa'])->name('siswa');
Route::post('/admin/tabelsiswa/tambah', [C_admin::class, 'tambahsiswa'])->name('tambah.siswa');
Route::get('/admin/siswa/edit/{nis}', [C_admin::class, 'editsiswa']);
Route::post('/admin/siswa/update/{nis}', [C_admin::class, 'updatesiswa']);
Route::delete('/admin/siswa/hapus/{nis}', [C_admin::class, 'deletesiswa'])->name('delete.siswa');
Route::get('/admin/tabelkelas',[C_admin::class,'indexkelas'])->name('kelas');
Route::post('/admin/tabelkelas/tambah', [C_admin::class, 'tambahkelas'])->name('tambah.kelas');
Route::delete('/admin/tabelkelas/hapus/{id_kelas}', [C_admin::class, 'deletekelas'])->name('delete.kelas');
Route::get('/admin/tabelmapel',[C_admin::class,'indexmapel'])->name('mapel');
Route::post('/admin/tabelmapel/tambah', [C_admin::class, 'tambahmapel'])->name('tambah.mapel');
Route::delete('/admin/tabelmapel/hapus/{id_mapel}', [C_admin::class, 'deletemapel'])->name('delete.mapel');

Route::get('/admin/tabelpamong',[C_admin::class,'indexpamong'])->name('pamong');
Route::post('/admin/tabelpamong/tambah', [C_admin::class, 'tambahpamong'])->name('tambah.pamong');
Route::get('/admin/pamong/edit/{nip}', [C_admin::class, 'editpamong']);
Route::post('/admin/pamong/update/{nip}', [C_admin::class, 'updatepamong']);
Route::get('/admin/mapel/edit/{id_mapel}', [C_admin::class, 'editmapel']);
Route::post('/admin/mapel/update/{id_mapel}', [C_admin::class, 'updatemapel'])->name('update.mapel');
Route::get('/admin/kelas/edit/{id_kelas}', [C_admin::class, 'editkelas']);
Route::post('/admin/kelas/update/{id_kelas}', [C_admin::class, 'updatekelas'])->name('update.kelas');
Route::delete('/admin/pamong/hapus/{nip}', [C_admin::class, 'deletepamong'])->name('delete.pamong');
Route::get('/logout',[C_Login::class,'logout'])->name('logout');

Route::get('/pamong',[C_pamong::class,'index']);
Route::get('/pamong/tabelmateri',[C_pamong::class,'indexmateri'])->name('materi');
Route::get('/pamong/tabelmateri/tambah', [C_pamong::class, 'formtambah'])->name('tambah.materi');
Route::post('/pamong/tabelmateri/tambah/insert', [C_pamong::class, 'tambahmateri'])->name('insert.materi');
Route::get('/pamong/tabelmateri/edit/{id_materi}', [C_pamong::class, 'editmateri']);
Route::delete('/pamong/tabelmateri/hapus/{id_materi}', [C_pamong::class, 'deletemateri'])->name('delete.materi');
Route::post('/pamong/tabelmateri/update/{id_materi}', [C_pamong::class, 'updatemateri'])->name('update.materi');

Route::get('/formulirprogram', [C_formulirprogram::class, 'create'])->name('formulirprogram.create');
Route::post('/formulirprogram', [C_formulirprogram::class, 'store'])->name('formulirprogram.store');

Route::get('/admin/formulirprogram', [C_kelolaformulirprogram::class, 'index'])->name('kelola.formulirprogram');
Route::get('/admin/formulirprogram/detail/{id_daftarprogram}', [C_kelolaformulirprogram::class, 'show'])->name('formulir.show');
Route::get('/admin/formulirprogram/edit/{id_daftarprogram}', [C_kelolaformulirprogram::class, 'edit'])->name('formulir.edit');
Route::put('/admin/formulirprogram/update/{id_daftarprogram}', [C_kelolaformulirprogram::class, 'update'])->name('formulir.update');
Route::delete('/admin/formulirprogram/delete/{id_daftarprogram}', [C_kelolaformulirprogram::class, 'delete'])->name('formulir.destroy');

Route::get('/formulirpaud', [C_formulirpaud::class, 'create'])->name('formulirpaud.create');
Route::post('/formulirpaud', [C_formulirpaud::class, 'store'])->name('formulirpaud.store');
Route::get('/masyarakat/formpaudskb', [SKBController::class, 'create']);
Route::post('/masyarakat/formpaudskb', [SKBController::class, 'store']);

Route::get('/admin/formulirpaud', [C_kelolaformulirpaud::class, 'index'])->name('kelola.formulirpaud');
Route::get('/admin/formulirpaud/detail/{id_paud}', [C_kelolaformulirpaud::class, 'show'])->name('formulirpaud.show');
Route::get('/admin/formulirpaud/edit/{id_paud}', [C_kelolaformulirpaud::class, 'edit'])->name('formulirpaud.edit');
Route::put('/admin/formulirpaud/update/{id_paud}', [C_kelolaformulirpaud::class, 'update'])->name('formulirpaud.update');
Route::delete('/admin/formulirpaud/delete/{id_paud}', [C_kelolaformulirpaud::class, 'delete'])->name('formulirpaud.destroy');


// Halaman awal pamong
Route::get('/pamong', [C_pamong::class, 'index']);

// ✅ Tabel Data Tugas
Route::get('/pamong/tabeltugas', [C_pamong::class, 'tugas'])->name('pamong.tugas');

// ✅ Form Tambah Tugas
Route::get('/pamong/tabeltugas/tambah', [C_pamong::class, 'formtambahtugas'])->name('tambah.tugas');

// ✅ Insert Tugas (POST)
Route::post('/pamong/tabeltugas/tambah/insert', [C_pamong::class, 'inserttugas'])->name('insert.tugas');

// ✅ Edit Tugas (GET)
Route::get('/pamong/tabeltugas/edit/{id_tugas}', [C_pamong::class, 'edittugas'])->name('edit.tugas');

// ✅ Update Tugas (POST)
Route::post('/pamong/tabeltugas/update/{id_tugas}', [C_pamong::class, 'updatetugas'])->name('update.tugas');

// ✅ Hapus Tugas (DELETE)
Route::delete('/pamong/tabeltugas/hapus/{id_tugas}', [C_pamong::class, 'deletetugas'])->name('delete.tugas');




    // Dashboard peserta didik (view: peserta.v_pesertadidik)
    Route::get('/pesertadidik', [C_Tpesertadidik::class, 'index'])->name('pesertadidikhome');

    // Materi
    Route::get('/peserta/materi', [C_Tpesertadidik::class, 'materi'])->name('pesertadidik.materipesertadidik');

    // Tugas
    Route::get('/peserta/tugas', [C_Tpesertadidik::class, 'tugas'])->name('peserta.tugas');

    // Ujian
    Route::get('/peserta/ujian', [C_Tpesertadidik::class, 'ujian'])->name('peserta.ujian');





Route::get('/login', function () {
    return view('masyarakat.v_login');
});

Route::post('/login', [C_Login::class, 'login'])->name('login.proses');