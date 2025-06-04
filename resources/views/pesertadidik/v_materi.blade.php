@extends('pesertadidik.templatepesertadidik')

@section('content')
<h1 class="text-2xl font-bold mb-6">Pilih Mata Pelajaran</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($mapel as $m)
    <a href="{{ route('materi.byMapel', $m->id_mapel) }}"
       class="block bg-white shadow rounded-lg p-6 text-center hover:bg-blue-100 transition">
        <h2 class="text-xl font-semibold text-blue-600">{{ $m->mapel }}</h2>
    </a>
    @endforeach
</div>
@endsection
