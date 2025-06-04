@extends('admin.templateadmin')

@section('content')

<div class="container mx-auto mt-20 px-4">
    <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-700 mb-6 border-b pb-2">Edit Data Pendaftaran</h2>

        <form action="{{ route('formulir.update', $item->id_daftarprogram) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nama Lengkap -->
            <div class="mb-4">
                <label class="block text-gray-600 font-medium mb-1">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500" value="{{ $item->nama_lengkap }}" required>
                @error('nama_lengkap')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- No HP -->
            <div class="mb-4">
                <label class="block text-gray-600 font-medium mb-1">No HP</label>
                <input type="text" name="no_hp" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500" value="{{ $item->no_hp }}" required>
                @error('no_hp')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-6">
                <label class="block text-gray-600 font-medium mb-1">Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500" value="{{ $item->email }}" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol -->
            <div class="flex justify-between">
                <a href="{{ route('kelola.formulirprogram') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded-lg transition duration-200">Kembali</a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded-lg transition duration-200">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
