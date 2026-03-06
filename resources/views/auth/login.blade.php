<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login Sistem Kanwil</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-600 flex items-center justify-center min-h-screen">

<div class="bg-white w-96 p-8 rounded-lg shadow-lg">

    <div class="text-center mb-6">

        <!-- Logo -->
        <img src="/logo-imigrasi.png" class="h-16 mx-auto mb-3">

        <h2 class="text-xl font-bold text-gray-800">
            Login Sistem
        </h2>

    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-sm mb-1">Email</label>
            <input type="email" name="email"
            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
            required>
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label class="block text-sm mb-1">Password</label>
            <input type="password" name="password"
            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
            required>
        </div>

        <!-- Button -->
        <button
        class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
        Login
        </button>

    </form>

</div>

</body>
</html>