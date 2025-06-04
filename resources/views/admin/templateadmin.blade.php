<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SKB Admin</title>
    <link rel="stylesheet" href="{{ asset('css/styleadmin.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 px-4 py-4 bg-white text-black border-r border-gray-200 shadow">
            <div class="p-4 text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded">
                SKB
            </div>
            <div class="px-4 py-4 text-center">
                <p class="mt-2 font-semibold text-lg">{{ Session::get('user')['username'] }}</p>
                <p class="text-sm text-gray-500">Admin SKB</p>
            </div>
            <nav class="space-y-1">
                <a href="/admin" class="flex items-center gap-3 py-2 px-4 rounded hover:bg-blue-50 transition">
                    <i class="fas fa-home w-5 text-blue-500"></i> Dashboard
                </a>
                <a href="/admin/tabelsiswa" class="flex items-center gap-3 py-2 px-4 rounded hover:bg-blue-50 transition">
                    <i class="fas fa-users w-5 text-blue-500"></i> Siswa
                </a>
                <a href="/admin/tabelkelas" class="flex items-center gap-3 py-2 px-4 rounded hover:bg-blue-50 transition">
                    <i class="fas fa-layer-group w-5 text-blue-500"></i> Program
                </a>
                <a href="/admin/tabelmapel" class="flex items-center gap-3 py-2 px-4 rounded hover:bg-blue-50 transition">
                    <i class="fas fa-book w-5 text-blue-500"></i> Mata Pelajaran
                </a>
                <a href="/admin/tabelpamong" class="flex items-center gap-3 py-2 px-4 rounded hover:bg-blue-50 transition">
                    <i class="fas fa-chalkboard-teacher w-5 text-blue-500"></i> Pamong Belajar
                </a>
                <a href="/admin/formulirprogram" class="flex items-center gap-3 py-2 px-4 rounded hover:bg-blue-50 transition">
                    <i class="fas fa-user-edit w-5 text-blue-500"></i> Kelola Peserta Didik
                </a>
                <a href="/admin/tabelpamong" class="flex items-center gap-3 py-2 px-4 rounded hover:bg-blue-50 transition">
                    <i class="fas fa-child w-5 text-blue-500"></i> Kelola Pendaftaran Paud
                </a>
                <a href="/admin/tabelpamong" class="flex items-center gap-3 py-2 px-4 rounded hover:bg-blue-50 transition">
                    <i class="fas fa-file-alt w-5 text-blue-500"></i> Kelola Laporan
                </a>
            </nav>
            <div class="absolute bottom-0 left-0 w-full px-4 py-3 border-t border-gray-200">
                <a href="/logout" class="block text-center text-blue-600 hover:underline">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>