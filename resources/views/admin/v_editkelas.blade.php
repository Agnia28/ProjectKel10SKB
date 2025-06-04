@extends('admin.templateadmin')
@section('content')

<div class="container mx-auto mt-20 px-4">
    <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-700 mb-6 border-b pb-2">Edit Data Kelas</h2>

        <form action="/admin/kelas/update/{{ $kelas->id_kelas }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- NIS -->
            <div class="mb-4">
                <label class="block text-gray-600 font-medium mb-1">ID kelas</label>
                <input type="text" name="id_kelas" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100 text-gray-700 focus:outline-none focus:ring focus:border-blue-500" value="{{ $kelas->id_kelas }}" readonly>
                @error('id_kelas')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nama -->
            <div class="mb-4">
                <label class="block text-gray-600 font-medium mb-1">Nama kelas</label>
                <input type="text" name="kelas" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500" placeholder="Masukkan Kelas" value="{{ $kelas->kelas }}">
                @error('kelas')
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
