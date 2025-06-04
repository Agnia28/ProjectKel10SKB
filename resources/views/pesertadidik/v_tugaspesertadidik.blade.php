@extends('pesertadidik.templatepesertadidik')

@section('content')
<h1 class="text-2xl font-bold mb-6">Daftar Tugas</h1>

<div class="bg-white rounded shadow p-6">
    <table class="min-w-full table-auto border">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="p-2">Judul Tugas</th>
                <th class="p-2">Mata Pelajaran</th>
                <th class="p-2">Deskripsi</th>
                <th class="p-2">Batas Waktu</th>
                <th class="p-2">File Tugas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataTugas as $tugas)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $tugas->judul_tugas }}</td>
                <td class="px-4 py-2">{{ $tugas->mapel }}</td>
                <td class="px-4 py-2">{{ $tugas->deskripsi ?? '-' }}</td>
                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($tugas->batas_waktu)->format('d-m-Y') }}</td>
                <td class="px-4 py-2">
                    @if($tugas->file_tugas)
                        <a href="{{ asset('tugas/' . $tugas->file_tugas) }}" target="_blank" class="text-blue-600 hover:underline">
                            {{ $tugas->file_tugas }}
                        </a>
                    @else
                        <span class="text-gray-400 italic">Tidak ada file</span>
                    @endif
                </td>
            </tr>
            @endforeach
            @if($dataTugas->isEmpty())
            <tr>
                <td colspan="5" class="text-center p-4 text-gray-500 italic">Belum ada tugas untuk kelas Anda.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
