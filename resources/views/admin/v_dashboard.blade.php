@extends('admin.templateadmin')

@section('content')
<h1 class="text-2xl font-bold mb-6">Dashboard</h1>
<div class="dashboard-grid">
    <div class="card">
        <div class="card-title">Jumlah Data Guru</div>
        <div class="card-count">0</div>
    </div>
    <div class="card">
        <div class="card-title">Jumlah Data Siswa</div>
        <div class="card-count">0</div>
    </div>
    <div class="card">
        <div class="card-title">Jumlah Data Kelas</div>
        <div class="card-count">3</div>
    </div>
    <div class="card">
        <div class="card-title">Jumlah Data Mapel</div>
        <div class="card-count">3</div>
    </div>
</div>

@endsection
