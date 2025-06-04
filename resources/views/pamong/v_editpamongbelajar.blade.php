@section('title') 
Pamong Belajar 
@endsection 

@extends ('pamongbelajar.v_templatepamong') 

@section('page') 
Edit Data Pamong Belajar 
@endsection 

@section('content') 
<div class="container-fluid"> 
    <div class="row"> 
        <div class="col-md-6"> 
            <div class="card card-primary"> 
                <div class="card-header"> 
                    <h3 class="card-title">Form Edit</h3> 
                </div> 

                <form action="/pamongbelajar/update/{{$pamongbelajar->id_pamongbelajar}}" method="POST" enctype="multipart/form-data"> 
                    @csrf 
                    <div class="card-body"> 
                        <div class="form-group"> 
                            <label for="nip">ID Pamong Belajar</label> 
                            <input type="text" name="id_pamongbelajar" class="form-control" value="{{$pamongbelajar->id_pamongbelajar}}"> 
                            <div class="text-danger">@error('idate-pamongbelajar') {{$message}} @enderror</div> 
                        </div> 

                    <div class="form-group"> 
                            <label for="nip">NIP</label> 
                            <input type="text" name="nip" class="form-control" value="{{$pamongbelajar->nip}}"> 
                            <div class="text-danger">@error('nip') {{$message}} @enderror</div> 
                        </div> 

                        <div class="form-group"> 
                            <label for="nama_pamongbelajar">Nama Pamong Belajar</label> 
                            <input type="text" name="nama_pamongbelajar" class="form-control" value="{{$pamongbelajar->nama_pamongbelajar}}"> 
                            <div class="text-danger">@error('nama_pamongbelajar') {{$message}} @enderror</div> 
                        </div> 

                        <div class="form-group"> 
                            <label for="mata_pelajaran">Mata Pelajaran</label> 
                            <input type="text" name="mata_pelajaran" class="form-control" value="{{$pamongbelajar->mata_pelajaran}}"> 
                            <div class="text-danger">@error('mata_pelajaran') {{$message}} @enderror</div> 
                        </div> 

                        <div class="form-group"> 
                            <label for="foto_pamongbelajar">Foto Pamong Belajar</label> 
                            <div class="input-group"> 
                                <div class="custom-file"> 
                                    <input type="file" name="foto_pamongbelajar" class="custom-file-input" id="foto_pamongbelajar"> 
                                    <label class="custom-file-label" for="foto_pamongbelajar">Pilih File</label> 
                                </div> 
                                <div class="input-group-append"> 
                                    <span class="input-group-text">Upload</span> 
                                </div> 
                            </div> 
                            <div class="text-danger">@error('foto_pamongbelajar') {{$message}} @enderror</div> 
                            <img src="{{url('foto_pamong/'.$pamongbelajar->foto_pamongbelajar)}}" width="100px" class="mt-2">
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