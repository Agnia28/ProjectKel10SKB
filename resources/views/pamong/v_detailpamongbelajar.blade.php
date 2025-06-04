@extends('pamongbelajar.v_templatepamong')

@section('content')
  <h1>Detail Pamong Belajar</h1>
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Informasi Pamong Belajar</h3>
    </div>

    <form>
      <div class="card-body">
        <div class="form-group">
          <label>NIP :</label>
          {{ $pamongbelajar->nip }}
        </div>

        <div class="form-group">
          <label>Nama Pamong Belajar :</label>
          {{ $pamongbelajar->nama_pamongbelajar }}
        </div>

        <div class="form-group">
          <label>Mata Pelajaran :</label>
          {{ $pamongbelajar->mata_pelajaran }}
        </div>

        <div class="form-group">
          <label>Foto :</label><br>
          <img src="{{ url('foto_pamongbelajar/' . $pamongbelajar->foto_pamongbelajar) }}" width="200px">
        </div>
      </div>

      <div class="card-footer">
        <a href="/pamongbelajar"><button type="button" class="btn btn-primary">Kembali</button></a>
      </div>
    </form>
  </div>
@endsection