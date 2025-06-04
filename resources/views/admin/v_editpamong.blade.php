@extends('admin.templateadmin')
@section('content')

<div class="container mx-auto mt-20 px-4">
    <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-700 mb-6 border-b pb-2">Edit Data Pamong Belajar</h2>

        <form action="/admin/pamong/update/{{ $pamong->nip }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- NIS -->
            <div class="mb-4">
                <label class="block text-gray-600 font-medium mb-1">Nomor Induk</label>
                <input type="text" name="nip" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100 text-gray-700 focus:outline-none focus:ring focus:border-blue-500" value="{{ $pamong->nip }}" readonly>
                @error('nip')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nama -->
            <div class="mb-4">
                <label class="block text-gray-600 font-medium mb-1">Nama Pamong Belajar</label>
                <input type="text" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500" placeholder="Masukkan Nama pamong" value="{{ $pamong->nama }}">
                @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-4">
                <label class="block text-gray-600 font-medium mb-1">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500" value="{{ $pamong->jenis_kelamin }}">
                    <option value="">Pilih</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
                @error('jenis_kelamin')
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
