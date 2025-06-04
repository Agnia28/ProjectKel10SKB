@extends('admin.templateadmin')

@section('content')
<h1 class="text-2xl font-bold mb-6">Data program</h1>
<div class="bg-white rounded shadow p-6">
    <table class="min-w-full table-auto border">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="px-4 py-2">ID Program</th>
                <th class="px-4 py-2">Nama Program</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datakelas as $kelas)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $kelas->id_kelas }}</td>
                <td class="px-4 py-2">{{ $kelas->kelas }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection