@extends('layout.v_template_formprogramskb')

@section('content')
<div class="container my-4">
    <h2 class="mb-4 text-center">Formulir Pendaftaran PAUD SPNF SKB Subang</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('formulirpaud.store') }}">
        @csrf

        {{-- === DATA ANAK DIDIK === --}}
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Data Anak Didik</div>
            <div class="card-body row">
                <div class="col-md-6 mb-3">
                    <label>Nama Lengkap</label>
                    <input name="nama_lengkap" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Nama Panggilan</label>
                    <input name="nama_panggilan" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>NIK</label>
                    <input name="nik" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Tempat, Tanggal Lahir</label>
                    <input name="tempat_tanggal_lahir" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Agama</label>
                    <input name="agama" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Kewarganegaraan</label>
                    <input name="kewarganegaraan" class="form-control" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Anak ke-</label>
                    <input name="anak_ke" type="number" class="form-control" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Jumlah Saudara</label>
                    <input name="jumlah_saudara" type="number" class="form-control" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Berat Badan (kg)</label>
                    <input name="berat_badan" class="form-control" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Tinggi Badan (cm)</label>
                    <input name="tinggi_badan" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Golongan Darah</label>
                    <input name="golongan_darah" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Penyakit yang Pernah Diderita</label>
                    <input name="penyakit_pernah_diderita" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label>No HP Orang Tua</label>
                    <input name="no_hp" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Jarak Tempat Tinggal ke PAUD</label>
                    <input name="jarak_tempat_tinggal" class="form-control">
                </div>
            </div>
        </div>

        {{-- === DATA AYAH === --}}
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">Data Ayah</div>
            <div class="card-body row">
                <div class="col-md-6 mb-3">
                    <label>Nama Ayah</label>
                    <input name="nama_ayah" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Pendidikan Terakhir Ayah</label>
                    <input name="pendidikan_ayah" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Pekerjaan Ayah</label>
                    <input name="pekerjaan_ayah" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Penghasilan Ayah</label>
                    <input name="penghasilan_ayah" class="form-control">
                </div>
            </div>
        </div>

        {{-- === DATA IBU === --}}
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">Data Ibu</div>
            <div class="card-body row">
                <div class="col-md-6 mb-3">
                    <label>Nama Ibu</label>
                    <input name="nama_ibu" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Pendidikan Terakhir Ibu</label>
                    <input name="pendidikan_ibu" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Pekerjaan Ibu</label>
                    <input name="pekerjaan_ibu" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Penghasilan Ibu</label>
                    <input name="penghasilan_ibu" class="form-control">
                </div>
            </div>
        </div>

        {{-- === DATA WALI === --}}
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">Data Wali</div>
            <div class="card-body row">
                <div class="col-md-6 mb-3">
                    <label>Nama Wali</label>
                    <input name="nama_wali" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Pendidikan Wali</label>
                    <input name="pendidikan_wali" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Hubungan Keluarga</label>
                    <input name="hubungan_keluarga" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Pekerjaan Wali</label>
                    <input name="pekerjaan_wali" class="form-control">
                </div>
            </div>
        </div>

        {{-- === ASAL MULA MASUK === --}}
        <div class="card mb-4">
            <div class="card-header bg-info text-white">Asal Mula Anak Masuk PAUD</div>
            <div class="card-body row">
                <div class="col-md-6 mb-3">
                    <label>Status Masuk</label>
                    <select name="status_masuk" class="form-control">
                        <option value="">-- Status Masuk --</option>
                        <option value="Baru">Baru</option>
                        <option value="Pindahan">Pindahan</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Asal PAUD (jika pindahan)</label>
                    <input name="asal_paud" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Tanggal Pindah</label>
                    <input name="tanggal_pindah" type="date" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Tanggal Diterima di PAUD</label>
                    <input name="tanggal_diterima" type="date" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Masuk di Kelompok (A/B)</label>
                    <input name="di_kelompok" class="form-control">
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success px-5 py-2">Kirim Pendaftaran</button>
        </div>
    </form>
</div>
@endsection
