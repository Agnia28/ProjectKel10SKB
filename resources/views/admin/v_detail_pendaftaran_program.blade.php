@extends('admin.templateadmin')

@section('content')

<div class="container mx-auto mt-20 px-4">
    <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-700 mb-6 border-b pb-2">Detail Pendaftaran</h2>

        <div class="space-y-4">
            <div>
                <p class="text-gray-600 font-medium">Nama Lengkap:</p>
                <p class="text-gray-800">{{ $item->nama_lengkap }}</p>
            </div>

            <div>
                <p class="text-gray-600 font-medium">Jenis Kelamin:</p>
                <p class="text-gray-800">{{ $item->jenis_kelamin }}</p>
            </div>

            <div>
                <p class="text-gray-600 font-medium">NISN:</p>
                <p class="text-gray-800">{{ $item->nisn }}</p>
            </div>

            <div>
                <p class="text-gray-600 font-medium">No HP:</p>
                <p class="text-gray-800">{{ $item->no_hp }}</p>
            </div>

            <div>
                <p class="text-gray-600 font-medium">Email:</p>
                <p class="text-gray-800">{{ $item->email }}</p>
            </div>

            <!-- Tambahkan field lainnya jika diperlukan -->
        </div>

        <div class="mt-6">
            <a href="{{ route('kelola.formulirprogram') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded-lg transition duration-200">Kembali</a>
        </div>
    </div>
</div>

@endsection
