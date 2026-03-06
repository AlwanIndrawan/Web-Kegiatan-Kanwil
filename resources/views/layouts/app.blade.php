<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <div class="flex">

  <!-- SIDEBAR -->
<div class="w-64 bg-gray-800 min-h-screen text-white p-6">

    <h2 class="text-xl font-bold mb-8 text-white">
        Sistem Kanwil
    </h2>

    <nav class="space-y-2">

        <a href="{{ route('dashboard') }}"
           class="block px-4 py-2 rounded text-gray-200 hover:bg-gray-700 hover:text-white transition">
           Dashboard
        </a>

        <a href="{{ route('kegiatan.index') }}"
           class="block px-4 py-2 rounded text-gray-200 hover:bg-gray-700 hover:text-white transition">
           Kegiatan
        </a>

        <a href="{{ route('kegiatan.create') }}"
           class="block px-4 py-2 rounded text-gray-200 hover:bg-blue-600 hover:text-white transition">
           + Tambah Kegiatan
        </a>

    </nav>

</div>

    <!-- CONTENT -->
    <div class="flex-1 p-6 bg-gray-100">

        {{ $slot }}

    </div>

</div>
        </div>
    </body>
</html>
