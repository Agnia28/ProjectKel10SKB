@section('title') 
Pamong Belajar 
@endsection 

@extends('pamongbelajar.v_templatepamong') 

@section('page') 
Tambah Data Pamong Belajar 
@endsection 

@section('content') 
<div class="container-fluid"> 
  <div class="row">
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Form Tambah Pamong Belajar</h3>
        </div>

        <form action="/pamongbelajar/insert" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
          <div class="form-group">
              <label for="id_pamongbelajar">ID Pamong Belajar</label>
              <input type="text" name="id_pamongbelajar" class="form-control" placeholder="Masukkan ID_Pamongbelajar" value="{{ old('id_pamongbelajar') }}">
              <div class="text-danger">@error('id_pamongbelajar') {{ $message }} @enderror</div>
            </div>

            <div class="form-group">
              <label for="nip">NIP</label>
              <input type="text" name="nip" class="form-control" placeholder="Masukkan NIP" value="{{ old('nip') }}">
              <div class="text-danger">@error('nip') {{ $message }} @enderror</div>
            </div>

            <div class="form-group">
              <label for="nama_pamongbelajar">Nama Pamong Belajar</label>
              <input type="text" name="nama_pamongbelajar" class="form-control" placeholder="Masukkan Nama Pamong Belajar" value="{{ old('nama_pamongbelajar') }}">
              <div class="text-danger">@error('nama_pamongbelajar') {{ $message }} @enderror</div>
            </div>

            <div class="form-group">
              <label for="mata_pelajaran">Bidang Keahlian / Mata Pelajaran</label>
              <input type="text" name="mata_pelajaran" class="form-control" placeholder="Masukkan Mata Pelajaran" value="{{ old('mata_pelajaran') }}">
              <div class="text-danger">@error('mata_pelajaran') {{ $message }} @enderror</div>
            </div>

            <div class="form-group">
              <label for="foto_pamongbelajar">Foto Pamong Belajar</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="foto_pamongbelajar" class="custom-file-input" id="foto_pamongbelajar">
                  <label class="custom-file-label" for="foto_pamongbelajar">Pilih file</label>
                </div>
              </div>
              <div class="text-danger">@error('foto_pamongbelajar') {{ $message }} @enderror</div>
            </div>
          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection