@extends('admin.templateadmin')
@section('content')

<div class="container mx-auto mt-20 px-4">
    <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-700 mb-6 border-b pb-2">Edit Data Siswa</h2>

        <form action="/admin/siswa/update/{{ $siswa->nis }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- NIS -->
            <div class="mb-4">
                <label class="block text-gray-600 font-medium mb-1">Nomor Induk</label>
                <input type="text" name="nis" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100 text-gray-700 focus:outline-none focus:ring focus:border-blue-500" value="{{ $siswa->nis }}" readonly>
                @error('nis')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nama -->
            <div class="mb-4">
                <label class="block text-gray-600 font-medium mb-1">Nama Siswa</label>
                <input type="text" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500" placeholder="Masukkan Nama Siswa" value="{{ $siswa->nama }}">
                @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-4">
                <label class="block text-gray-600 font-medium mb-1">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500" value="{{ $siswa->jenis_kelamin }}">
                    <option value="">Pilih</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- ID Kelas -->
            <div class="mb-6">
                <label class="block text-gray-600 font-medium mb-1">ID Kelas</label>
                <select name="id_kelas" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500" value="{{ $siswa->id_kelas }}">
                    <option value="">Pilih</option>
                    @foreach($kelas as $k)
                        <option value="{{ $k->id_kelas }}">{{ $k->kelas }}</option>
                    @endforeach
                    <!-- Tambahkan sesuai data -->
                </select>
                @error('id_kelas')
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
