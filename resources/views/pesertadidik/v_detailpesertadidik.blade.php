@extends('layout.v_template')

@section('content')
  <h1>Halaman Detail Peserta Didik</h1>
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Data Lengkap Peserta Didik</h3>
    </div>

    <form>
      <div class="card-body">
        <div class="form-group">
          <label>NISN :</label>
          {{ $pesertadidik->nisn }}
        </div>

        <div class="form-group">
          <label>Nama Peserta Didik :</label>
          {{ $pesertadidik->nama_lengkap }}
        </div>

        <div class="form-group">
          <label>Tempat Lahir :</label>
          {{ $pesertadidik->tempat_lahir }}
        </div>

        <div class="form-group">
          <label>Tanggal Lahir :</label>
          {{ $pesertadidik->tanggal_lahir }}
        </div>

        <div class="form-group">
          <label>Jenis Kelamin :</label>
          {{ $pesertadidik->jenis_kelamin }}
        </div>

        <div class="form-group">
          <label>Alamat :</label>
          {{ $pesertadidik->alamat }}
        </div>

        <div class="form-group">
          <label>Agama :</label>
          {{ $pesertadidik->agama }}
        </div>

        <div class="form-group">
          <label>Program :</label>
          {{ $pesertadidik->program }}
        </div>

        <div class="form-group">
          <label>No Handphone :</label>
          {{ $pesertadidik->nomor_handphone }}
        </div>

        <div class="form-group">
          <label>Foto :</label><br>
          <img src="{{ url('foto_pesertadidik/' . $pesertadidik->fotopesertadidik) }}" width="200px">
        </div>
      </div>

      <div class="card-footer">
        <a href="/pesertadidik"><button type="button" class="btn btn-primary">Kembali</button></a>
      </div>
    </form>
  </div>
@endsection