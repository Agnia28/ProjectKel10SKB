@extends('pesertadidik.templatepesertadidik')

@section('content')
<h1 class="text-2xl font-bold mb-6">Daftar Materi</h1>

@foreach($dataMateri as $mapel => $materiList)
    <h2 class="text-xl font-semibold mb-4 mt-8 border-b pb-2">{{ $mapel }}</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($materiList as $materi)
        @php
            $fileName = $materi->file;
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $icon = match(strtolower($ext)) {
                'pdf' => 'https://cdn-icons-png.flaticon.com/512/337/337946.png',
                'xls', 'xlsx' => 'https://cdn-icons-png.flaticon.com/512/888/888878.png',
                'doc', 'docx' => 'https://cdn-icons-png.flaticon.com/512/281/281760.png',
                'mp4' => 'https://cdn-icons-png.flaticon.com/512/136/136534.png',
                'jpg', 'jpeg', 'png' => 'https://cdn-icons-png.flaticon.com/512/136/136524.png',
                default => 'https://cdn-icons-png.flaticon.com/512/833/833524.png'
            };
        @endphp

        <div class="bg-white rounded-xl shadow-md p-4 flex flex-col justify-between h-full">
            <div>
                <div class="flex items-center space-x-3 mb-4">
                    <img src="{{ $icon }}" alt="file icon" class="w-8 h-8">
                    <h2 class="text-lg font-semibold">{{ $materi->nama_materi }}</h2>
                </div>
                <p class="text-sm text-gray-600"><strong>Kelas:</strong> {{ $materi->kelas }}</p>
                <p class="text-sm text-gray-600 mb-3"><strong>Keterangan:</strong> {{ $materi->keterangan_materi }}</p>
            </div>

            @if($materi->file)
            <a href="{{ asset('materi/' . $materi->file) }}"
               class="mt-auto inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition"
               target="_blank" rel="noopener noreferrer">
                📄 Lihat Materi
            </a>
            @else
            <span class="text-gray-400 italic">Tidak ada file</span>
            @endif
        </div>
        @endforeach
    </div>
@endforeach
@endsection
