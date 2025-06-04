@extends('admin.templateadmin')
@section('content')

<div class="container mx-auto mt-20 px-4">
    <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-700 mb-6 border-b pb-2">Edit Data Mata Pelajaran</h2>

        <form action="/admin/mapel/update/{{ $mapel->id_mapel }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- NIS -->
            <div class="mb-4">
                <label class="block text-gray-600 font-medium mb-1">ID Mata Pelajaran</label>
                <input type="text" name="id_mapel" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100 text-gray-700 focus:outline-none focus:ring focus:border-blue-500" value="{{ $mapel->id_mapel }}" readonly>
                @error('id_mapel')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nama -->
            <div class="mb-4">
                <label class="block text-gray-600 font-medium mb-1">Nama Mata Pelajaran</label>
                <input type="text" name="mapel" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500" placeholder="Masukkan Nama Siswa" value="{{ $mapel->mapel }}">
                @error('mapel')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-600 font-medium mb-1">Pamong Yang Mengajar</label>
                <select name="id_pamong" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500" value="{{ $mapel->nip }}">
                    <option value="">Pilih</option>
                    @foreach($pamong as $p)
                        <option value="{{ $p->nip }}">{{ $p->nama }}</option>
                    @endforeach
                    <!-- Tambahkan sesuai data -->
                </select>
                @error('nip')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded-lg transition duration-200">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
