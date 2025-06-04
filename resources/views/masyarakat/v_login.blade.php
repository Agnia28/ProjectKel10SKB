<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SKB</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white min-h-screen flex items-center justify-center">
    <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-2 items-center gap-4 px-6">
        <!-- Login Form -->
        <div class="space-y-6">
            <h2 class="text-3xl font-semibold text-gray-800">Log In to <span class="text-blue-600 font-bold">SKB</span></h2>
            <form action="{{ route('login.proses') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center text-sm">
                        <input type="checkbox" onclick="togglePassword()" class="mr-2"> Show Password
                    </label>
                    <a href="#" class="text-sm text-blue-500 underline">Lupa Password?</a>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 shadow-md">Log In</button>
            </form>

            <p class="text-xs text-gray-500">&copy;
                <a href="https://www.freepik.com" class="underline text-blue-400">Illustration by Syifa Nazwa</a>
            </p>
        </div>

        <!-- Illustration -->
        <div class="hidden md:block">
            <img src="{{ asset('img/login.jpg') }}" alt="Login Illustration">
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            passwordInput.type = passwordInput.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>
