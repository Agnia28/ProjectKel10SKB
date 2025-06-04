@extends('pamong.templatepamong')

@section('content')
<div class="max-w-3xl mx-auto mt-10">
    <div class="bg-white shadow-md rounded-lg">
        <div class="bg-blue-600 text-white px-6 py-4 rounded-t-lg">
            <h4 class="text-lg font-semibold">Tambah Tugas</h4>
        </div>
        <div class="px-6 py-4">
            <a href="/pamong/tabeltugas" class="inline-block mb-4 text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded">
                Kembali
            </a>

            <form action="{{ route('insert.tugas') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="judul_tugas" class="block font-semibold mb-1">Judul Tugas</label>
                    <input type="text" name="judul_tugas" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Masukkan judul tugas" required>
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block font-semibold mb-1">Deskripsi</label>
                    <textarea name="deskripsi" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" rows="5" placeholder="Tulis deskripsi tugas" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="id_mapel" class="block font-semibold mb-1">Mapel</label>
                    <select name="id_mapel" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        <option value="">Pilih Mapel</option>
                        @foreach($mapel as $m)
                            <option value="{{ $m->id_mapel }}">{{ $m->mapel }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="id_kelas" class="block font-semibold mb-1">Kelas</label>
                    <select name="id_kelas" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        <option value="">Pilih Kelas</option>
                        @foreach($kelas as $k)
                            <option value="{{ $k->id_kelas }}">{{ $k->kelas }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="file_tugas" class="block font-semibold mb-1">Upload File <span class="text-sm text-gray-500">(Max 10MB)</span></label>
                    <input type="file" name="file_tugas" class="w-full border border-gray-300 p-2 rounded">
                </div>

                <div class="mb-4">
                    <label for="tanggal_deadline" class="block font-semibold mb-1">Tanggal Deadline</label>
                    <input type="date" name="tanggal_deadline" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>

                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Simpan Tugas
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
