@extends('admin.templateadmin')

@section('content')
<h1 class="text-2xl font-bold mb-6">Data Siswa</h1>
<div class="bg-white rounded shadow p-6">
    <div class="mb-4 flex justify-between items-center">
    </div>
    <div x-data="{ showModal: false }">
    <!-- Tombol Tambah -->
    <button class="bg-blue-600 text-white px-4 py-2 rounded mr-2" @click="showModal = true">Tambah</button>

    <!-- Modal -->
    <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white w-11/12 max-w-4xl p-6 rounded shadow-lg" @click.outside="showModal = false">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Tambah Siswa</h2>
                <button @click="showModal = false" class="text-gray-500 hover:text-red-600 text-xl">×</button>
            </div>

            <form action="{{ route('tambah.siswa') }}" method="POST">
                @csrf
                <table class="w-full table-auto text-sm mb-4">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2">No Induk</th>
                            <th class="p-2">Nama</th>
                            <th class="p-2">Gender</th>
                            <th class="p-2">Kelas</th>
                            <th class="p-2">Opsi</th>
                        </tr>
                    </thead>
                    <tbody x-data="{ rows: [0] }">
                        <template x-for="(row, index) in rows" :key="index">
                            <tr>
                                <td class="p-2"><input type="text" name="siswa[index][no_induk]" class="border rounded w-full px-2 py-1" required></td>
                                <td class="p-2"><input type="text" name="siswa[index][nama]" class="border rounded w-full px-2 py-1" required></td>
                                <td class="p-2">
                                    <select name="siswa[index][gender]" class="border rounded w-full px-2 py-1">
                                        <option value="">Pilih</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </td>
                                <td class="p-2">
                                    <select name="siswa[index][kelas]" class="border rounded w-full px-2 py-1">
                                        <option value="">Pilih</option>
                                        @foreach($kelas as $k)
                                            <option value="{{ $k->id_kelas }}">{{ $k->kelas }}</option>
                                        @endforeach
                                        <!-- Tambahkan sesuai data -->
                                    </select>
                                </td>
                                <td class="p-2 text-center">
                                    <button type="button" @click="rows.splice(index, 1)" class="bg-red-500 text-white px-2 py-1 rounded">🗑️</button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
                <div class="flex justify-end space-x-2">
                    <button type="button" @click="showModal = false" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <table class="min-w-full table-auto border">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="px-4 py-2">No Induk</th>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Jenis Kelamin</th>
                <th class="px-4 py-2">Kelas</th>
                <th class="px-4 py-2">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataSiswa as $siswa)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $siswa->nis }}</td>
                <td class="px-4 py-2">{{ $siswa->nama }}</td>
                <td class="px-4 py-2">{{ $siswa->jenis_kelamin }}</td>
                <td class="px-4 py-2">{{ $siswa->kelas }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="/admin/siswa/edit/{{ $siswa->nis }}" class="bg-blue-600 text-white px-3 py-1 rounded">✏️</a>
                    <form action="/admin/siswa/hapus/{{ $siswa->nis }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">🗑️</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
