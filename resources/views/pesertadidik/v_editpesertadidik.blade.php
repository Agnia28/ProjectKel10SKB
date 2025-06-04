@section('title') 
Peserta Didik
@endsection 

@extends ('layout/v_template') 

@section('page') 
Edit Data Peserta Didik
@endsection 

@section('content') 
<div class="container-fluid"> 
  <div class="row"> 
    <div class="col-md-6"> 
      <div class="card card-primary"> 
        <div class="card-header"> 
          <h3 class="card-title">Form Edit</h3> 
        </div> 

        <form action="/pesertadidik/update/{{$pesertadidik->nisn}}" method="POST" enctype="multipart/form-data"> 
          @csrf 
          <div class="card-body"> 
            <div class="form-group"> 
              <label for="nisn">NISN</label> 
              <input type="text" name="nisn" class="form-control" value="{{$pesertadidik->nisn}}"> 
              <div class="text-danger">@error('nisn') {{$message}} @enderror</div> 
            </div> 

            <div class="form-group"> 
              <label for="nama_lengkap">Nama Lengkap</label> 
              <input type="text" name="nama_lengkap" class="form-control" value="{{$pesertadidik->nama_lengkap}}"> 
              <div class="text-danger">@error('nama_lengkap') {{$message}} @enderror</div> 
            </div> 

            <div class="form-group"> 
              <label for="tempat_lahir">Tempat Lahir</label> 
              <input type="text" name="tempat_lahir" class="form-control" value="{{$pesertadidik->tempat_lahir}}"> 
              <div class="text-danger">@error('tempat_lahir') {{$message}} @enderror</div> 
            </div> 

            <div class="form-group"> 
              <label for="tanggal_lahir">Tanggal Lahir</label> 
              <input type="date" name="tanggal_lahir" class="form-control" value="{{$pesertadidik->tanggal_lahir}}"> 
              <div class="text-danger">@error('tanggal_lahir') {{$message}} @enderror</div> 
            </div> 

            <div class="form-group"> 
              <label for="jenis_kelamin">Jenis Kelamin</label> 
              <input type="text" name="jenis_kelamin" class="form-control" value="{{$pesertadidik->jenis_kelamin}}"> 
              <div class="text-danger">@error('jenis_kelamin') {{$message}} @enderror</div> 
            </div> 

            <div class="form-group"> 
              <label for="alamat">Alamat</label> 
              <input type="text" name="alamat" class="form-control" value="{{$pesertadidik->alamat}}"> 
              <div class="text-danger">@error('alamat') {{$message}} @enderror</div> 
            </div> 

            <div class="form-group"> 
              <label for="agama">Agama</label> 
              <input type="text" name="agama" class="form-control" value="{{$pesertadidik->agama}}"> 
              <div class="text-danger">@error('agama') {{$message}} @enderror</div> 
            </div> 

            <div class="form-group"> 
              <label for="program">Program</label> 
              <input type="text" name="program" class="form-control" value="{{$pesertadidik->program}}"> 
              <div class="text-danger">@error('program') {{$message}} @enderror</div> 
            </div> 

            <div class="form-group"> 
              <label for="nomor_handphone">Nomor Handphone</label> 
              <input type="text" name="nomor_handphone" class="form-control" value="{{$pesertadidik->nomor_handphone}}"> 
              <div class="text-danger">@error('nomor_handphone') {{$message}} @enderror</div> 
            </div> 

            <div class="form-group"> 
              <label for="foto">Foto</label> 
              <div class="input-group"> 
                <div class="custom-file"> 
                  <input type="file" name="fotopesertadidik" class="custom-file-input" id="fotopesertadidik"> 
                  <label class="custom-file-label" for="fotopesertadidik">Pilih file</label> 
                </div> 
                <div class="input-group-append"> 
                  <span class="input-group-text">Upload</span> 
                </div> 
              </div> 
              <div class="text-danger">@error('fotopesertadidik') {{$message}} @enderror</div> 
              <img src="{{url('foto_pesertadidik/'.$pesertadidik->fotopesertadidik)}}" width="100px" class="mt-2">
            </div> 
          </div> 

          <div class="card-footer"> 
            <button type="submit" class="btn btn-primary">Update</button> 
          </div> 
        </form> 
      </div> 
    </div> 
  </div> 
</div> 
@endsection