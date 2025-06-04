@section('title')
Pamong Belajar
@endsection

@extends('pamongbelajar.v_templatepamong')

@section('page')
Halaman Pamong Belajar
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Pamong Belajar</h3>
    </div>
    <div class="card-body">
        @if (session('pesan'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success</h5>
                {{ session('pesan') }}
            </div>
        @endif

        <div class="mb-3 text-right">
            <a href="/pamongbelajar/add" class="btn btn-sm btn-primary">Add Data</a>
        </div>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Pamong</th>
                    <th>Mata Pelajaran</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($pamongbelajar as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nip }}</td>
                    <td>{{ $data->nama_pamongbelajar }}</td>
                    <td>{{ $data->mata_pelajaran }}</td>
                    <td><img src="{{ url('foto_pamongbelajar/' . $data->foto_pamongbelajar) }}" width="100px"></td>
                    <td>
                        <a href="/pamongbelajar/detail/{{ $data->id_pamongbelajar }}" class="btn btn-sm btn-success">Detail</a>
                        <a href="/pamongbelajar/edit/{{ $data->id_pamongbelajar }}" class="btn btn-sm btn-warning">Edit</a>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_pamongbelajar }}">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @foreach ($pamongbelajar as $data)
        <div class="modal fade" id="delete{{ $data->id_pamongbelajar }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ $data->nama_pamongbelajar }}</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="/pamongbelajar/delete/{{ $data->id_pamongbelajar }}" class="btn btn-outline-light">Yes</a>
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection