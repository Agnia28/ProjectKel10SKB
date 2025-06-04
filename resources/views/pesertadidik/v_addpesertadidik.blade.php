@section('title') 
Peserta Didik 
@endsection 

@extends ('layout/v_template') 

@section('page') 
Tambah Data Peserta Didik 
@endsection 

@section("content") 
<div class="container-fluid"> 
    <div class="row"> 
        <div class="col-md-6"> 
            <div class="card card-primary"> 
                <div class="card-header"> 
                    <h3 class="card-title">Form Tambah Peserta Didik</h3> 
                </div> 

                <form action="/pesertadidik/add" method="POST" enctype="multipart/form-data"> 
                    @csrf 
                    <div class="card-body"> 
                        <div class="form-group"> 
                            <label>NISN</label> 
                            <input type="text" name="nisn" class="form-control" placeholder="Masukkan NISN" value="{{ old('nisn') }}"> 
                            <div class="text-danger">@error('nisn') {{ $message }} @enderror</div> 
                        </div> 

                        <div class="form-group"> 
                            <label>Nama Lengkap</label> 
                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap" value="{{ old('nama_lengkap') }}"> 
                            <div class="text-danger">@error('nama_lengkap') {{ $message }} @enderror</div> 
                        </div> 

                        <div class="form-group"> 
                            <label>Tempat Lahir</label> 
                            <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}"> 
                            <div class="text-danger">@error('tempat_lahir') {{ $message }} @enderror</div> 
                        </div> 

                        <div class="form-group"> 
                            <label>Tanggal Lahir</label> 
                            <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}"> 
                            <div class="text-danger">@error('tanggal_lahir') {{ $message }} @enderror</div> 
                        </div> 

                        <div class="form-group"> 
                            <label>Jenis Kelamin</label> 
                            <select name="jenis_kelamin" class="form-control">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <div class="text-danger">@error('jenis_kelamin') {{ $message }} @enderror</div> 
                        </div> 

                        <div class="form-group"> 
                            <label>Alamat</label> 
                            <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea> 
                            <div class="text-danger">@error('alamat') {{ $message }} @enderror</div> 
                        </div> 

                        <div class="form-group"> 
                            <label>Agama</label> 
                            <input type="text" name="agama" class="form-control" value="{{ old('agama') }}"> 
                            <div class="text-danger">@error('agama') {{ $message }} @enderror</div> 
                        </div> 

                        <div class="form-group"> 
                            <label>Program</label> 
                            <input type="text" name="program" class="form-control" value="{{ old('program') }}"> 
                            <div class="text-danger">@error('program') {{ $message }} @enderror</div> 
                        </div> 

                        <div class="form-group"> 
                            <label>No Handphone</label> 
                            <input type="text" name="nomor_handphone" class="form-control" value="{{ old('nomor_handphone') }}"> 
                            <div class="text-danger">@error('nomor_handphone') {{ $message }} @enderror</div> 
                        </div> 

                        <div class="form-group"> 
                            <label>Foto</label> 
                            <div class="input-group"> 
                                <div class="custom-file"> 
                                    <input type="file" name="fotopesertadidik" class="custom-file-input" id="foto"> 
                                    <label class="custom-file-label" for="foto">Pilih file</label> 
                                </div> 
                            </div> 
                            <div class="text-danger">@error('fotopesertadidik') {{ $message }} @enderror</div> 
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
