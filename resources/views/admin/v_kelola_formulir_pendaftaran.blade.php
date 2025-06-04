@extends('admin.templateadmin')

@section('content')
<h1 class="text-2xl font-bold mb-6">Data Pendaftaran Program</h1>
<div class="bg-white rounded shadow p-6">
    @if(session('success'))
        <p class="mb-4 text-green-600 font-semibold">{{ session('success') }}</p>
    @endif

    <table class="min-w-full table-auto border">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="px-4 py-2">Nama Lengkap</th>
                <th class="px-4 py-2">NISN</th>
                <th class="px-4 py-2">No HP</th>
                <th class="px-4 py-2">Program</th>
                <th class="px-4 py-2">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $item->nama_lengkap }}</td>
                <td class="px-4 py-2">{{ $item->nisn }}</td>
                <td class="px-4 py-2">{{ $item->no_hp }}</td>
                <td class="px-4 py-2">{{ $item->paket }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('formulir.show', $item->id_daftarprogram) }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Detail</a>
                    <a href="{{ route('formulir.edit', $item->id_daftarprogram) }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">✏️</a>
                    <form action="{{ route('formulir.destroy', $item->id_daftarprogram) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" onclick="return confirm('Yakin ingin hapus data ini?')">🗑️</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
