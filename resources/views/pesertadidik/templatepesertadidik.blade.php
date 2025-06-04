<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SKB Peserta Didik</title>
    <link rel="stylesheet" href="{{ asset('css/styleadmin.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="px-4 py-4 bg-white text-black border-b border-gray-20">
            <div class="p-4 text-xl font-bold bg-black text-white">SKB</div>
            <div class="px-4 py-4 bg-white text-black">
                <div class="mb-4" style="color:black">
                    <p class="text-center mt-2 font-semibold">{{ Session::get('user')['username'] }}</p>
                    <p class="text-center text-sm text-gray-600">Peserta Didik</p>
                </div>
                <nav>
                    <a href="/peserta" class="block py-2 px-4 hover:bg-gray-100">Dashboard</a>
                    <a href="/peserta/materi" class="block py-2 px-4 hover:bg-gray-100">Materi</a>
                    <a href="/peserta/tugas" class="block py-2 px-4 hover:bg-gray-100">Tugas</a>
                    <a href="/peserta/ujian" class="block py-2 px-4 hover:bg-gray-100">Ujian</a>
                </nav>
            </div>
            <div class="absolute bottom-0 p-4 text-sm">
                <a href="/logout" class="block mt-2 text-blue-600 hover:underline">Logout</a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.25.1-lts/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('text');
    </script>
</body>
</html>
