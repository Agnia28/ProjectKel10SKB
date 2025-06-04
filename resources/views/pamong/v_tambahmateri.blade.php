@extends('pamong.templatepamong')

@section('content')
<div class="max-w-3xl mx-auto mt-10">
    <div class="bg-white shadow-md rounded-lg">
        <div class="bg-blue-600 text-white px-6 py-4 rounded-t-lg">
            <h4 class="text-lg font-semibold">Tambah Materi</h4>
        </div>
        <div class="px-6 py-4">
            <a href="/pamong/tabelmateri" class="inline-block mb-4 text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded">
                Kembali
            </a>

            <form action="{{ route('insert.materi') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="nama_materi" class="block font-semibold mb-1">Nama Materi</label>
                    <input type="text" name="nama_materi" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Masukkan nama materi" required>
                </div>

                <div class="mb-4">
                    <label for="mapel" class="block font-semibold mb-1">Mapel</label>
                    <select name="id_mapel" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        <option value="">Pilih Mapel</option>
                            @foreach($mapel as $m)
                                <option value="{{ $m->id_mapel }}">{{ $m->mapel }}</option>
                            @endforeach
                        <!-- Tambahkan mapel lain jika perlu -->
                    </select>
                </div>

                <div class="mb-4">
                    <label for="kelas" class="block font-semibold mb-1">Kelas</label>
                    <select name="id_kelas" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        <option value="">Pilih Kelas</option>
                            @foreach($kelas as $k)
                                <option value="{{ $k->id_kelas }}">{{ $k->kelas }}</option>
                            @endforeach
                        <!-- Tambahkan kelas lainnya -->
                    </select>
                </div>

                <div class="mb-4">
                    <label for="text" class="block font-semibold mb-1">Text</label>
                    <textarea name="keterangan_materi" id="text" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" rows="5" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="file" class="block font-semibold mb-1">Upload File <span class="text-sm text-gray-500">(Max 10MB)</span></label>
                    <input type="file" name="file" class="w-full border border-gray-300 p-2 rounded">
                </div>

                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
