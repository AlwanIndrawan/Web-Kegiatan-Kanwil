<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-950 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-xl shadow-lg w-96">

    <div class="text-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Register
        </h1>
        <p class="text-sm text-gray-500">
            Sistem Kegiatan Kanwil
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nama -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Nama
            </label>

            <input type="text"
                   name="name"
                   value="{{ old('name') }}"
                   class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300"
                   required>

            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Email
            </label>

            <input type="email"
                   name="email"
                   value="{{ old('email') }}"
                   class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300"
                   required>

            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Bidang -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Bidang
            </label>

            <select name="bidang_id"
                class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300"
                required>

                <option value="">Pilih Bidang</option>

                @foreach(\App\Models\Bidang::all() as $bidang)

                <option value="{{ $bidang->id }}">
                    {{ $bidang->nama }}
                </option>

                @endforeach

            </select>

            @error('bidang_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
                Password
            </label>

            <input type="password"
                   name="password"
                   class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300"
                   required>

            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Konfirmasi Password -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700">
                Konfirmasi Password
            </label>

            <input type="password"
                   name="password_confirmation"
                   class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300"
                   required>
        </div>

        <!-- Button -->
        <button type="submit"
                class="w-full bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700">
            Register
        </button>

        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-blue-600 text-sm hover:underline">
                Sudah punya akun? Login
            </a>
        </div>

    </form>

</div>

</body>
</html>