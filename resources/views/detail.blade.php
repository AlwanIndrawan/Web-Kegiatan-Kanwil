<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>{{ $kegiatan->judul }}</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">

<!-- NAVBAR -->

<nav class="bg-blue-950 shadow">

<div class="w-full px-4 lg:px-8">

<div class="flex justify-between items-center h-16">

<div class="flex items-center gap-3 text-white">
<img src="{{ asset('logo-imigrasi.png') }}" class="h-10">

<div class="leading-tight">
<p class="font-bold text-sm">
Kantor Wilayah
</p>

<p class="text-xs text-blue-200">
Direktorat Jenderal Imigrasi Sulawesi Selatan
</p>
</div>
</div>

<div class="flex items-center">

<a href="{{ route('login') }}"
class="bg-white text-blue-800 px-4 py-2 rounded font-semibold hover:bg-gray-200 transition">

Login

</a>

</div>

</div>

</div>

</nav>

<div class="max-w-4xl mx-auto p-6">

<div class="mt-6 mb-6 text-left">

<a href="/"
class="bg-white text-center w-40 rounded-2xl h-12 relative text-black text-sm font-semibold group inline-block overflow-hidden">

<div
class="bg-blue-700 rounded-xl h-10 w-10 flex items-center justify-center absolute left-1 top-[4px] group-hover:w-[150px] z-10 duration-500">

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" height="20" width="20">
<path d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z" fill="#000"></path>
<path d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z" fill="#000"></path>
</svg>

</div>

<p class="translate-x-4 leading-[48px]">Kembali</p>

</a>

</div>

<div class="bg-white rounded shadow overflow-hidden">

@if($kegiatan->foto)

<img
src="{{ asset('storage/'.$kegiatan->foto) }}"
class="w-full h-96 object-cover">

@endif

<div class="p-6">

<h1 class="text-3xl font-bold mb-2">
{{ $kegiatan->judul }}
</h1>

<div class="text-gray-500 mb-4 space-y-1">

<p>
<span class="font-medium text-gray-700">
{{ $kegiatan->bidang->nama ?? '-' }}
</span>
</p>

<p>
Tanggal : <span class="font-medium text-gray-700">
{{ $kegiatan->tanggal }}
</span>
</p>

</div>

<p class="text-gray-700 leading-relaxed">
{{ $kegiatan->deskripsi }}
</p>

</div>

</div>

</div>

<!-- FOOTER -->

<footer class="bg-blue-950 text-white mt-16">

<div class="w-full px-12 lg:px-24 py-14">

<div class="grid md:grid-cols-3 gap-20">

<div>

<div class="flex items-center gap-4 mb-6">

<img src="{{ asset('logo-imigrasi.png') }}" class="h-12">

<div class="leading-tight">
<p class="font-semibold text-sm">
Kantor Wilayah Direktorat Jenderal Imigrasi
</p>

<p class="text-sm text-blue-200">
Sulawesi Selatan
</p>
</div>

</div>

<div class="text-sm text-blue-100 space-y-3">

<p>📍 JL. Sultan Alauddin No 191A Gunung Sari Rappocini Makassar 90221</p>
<p>📞 082156757195</p>
<p>✉ kanwilimigrasisulsel@gmail.com</p>

</div>

</div>

<div>

<h3 class="font-semibold text-base mb-6">
Situs Terkait
</h3>

<ul class="space-y-3 text-blue-200 text-sm">

<li><a href="https://www.imigrasi.go.id" class="hover:text-white">Ditjen Imigrasi</a></li>
<li><a href="https://poltekim.ac.id" class="hover:text-white">Politeknik Imigrasi</a></li>

</ul>

</div>

<div>

<h3 class="font-semibold text-base mb-6">
Profil Unit Pelaksana Teknis
</h3>

<ul class="space-y-3 text-blue-200 text-sm">

<li><a href="https://makassar.imigrasi.go.id" class="hover:text-white">Kantor Imigrasi Kelas I TPI Makassar</a></li>
<li><a href="https://parepare.imigrasi.go.id" class="hover:text-white">Kantor Imigrasi Kelas II TPI Parepare</a></li>
<li><a href="https://palopo.imigrasi.go.id" class="hover:text-white">Kantor Imigrasi Kelas II Non TPI Palopo</a></li>
<li><a href="https://bantaeng.imigrasi.go.id" class="hover:text-white">Kantor Imigrasi Kelas III Non TPI Bantaeng</a></li>
<li><a href="https://bone.imigrasi.go.id" class="hover:text-white">Kantor Imigrasi Kelas III Non TPI Bone</a></li>
<li><a href="http://rudenimmakassar.imigrasi.go.id" class="hover:text-white">Rumah Detensi Makassar</a></li>

</ul>

</div>

</div>

</div>

<div class="border-t border-blue-800 text-center py-6 text-sm">

<p class="text-yellow-400">
Laman Resmi Kantor Wilayah Ditjen Imigrasi Sulawesi Selatan
</p>

<p class="text-gray-300">
Copyright © 2026 Direktorat Jenderal Imigrasi
</p>

</div>

</footer>

</body>

</html>