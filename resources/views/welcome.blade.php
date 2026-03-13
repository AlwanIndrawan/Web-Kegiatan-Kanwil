<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Website Kegiatan</title>
<link rel="icon" type="image/png" href="{{ asset('Logo_Ditjen_Imigrasi.png') }}">

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

.slide{
display:none;
}

/* LOGIN BUTTON KECIL */

.animated-button {
position: relative;
display: flex;
align-items: center;
gap: 4px;
padding: 6px 16px; /* lebih kecil */
border: 3px solid transparent;
font-size: 12px; /* teks lebih kecil */
background-color: white;
border-radius: 100px;
font-weight: 600;
color: #1f387e;
box-shadow: 0 0 0 2px #ffffff;
cursor: pointer;
overflow: hidden;
transition: all 0.6s cubic-bezier(0.23,1,0.32,1);
text-decoration: none;
}

.animated-button svg {
position: absolute;
width: 16px; /* icon lebih kecil */
fill: #1f387e;
z-index: 9;
transition: all 0.8s cubic-bezier(0.23,1,0.32,1);
}

.animated-button .arr-1 {
right: 6px;
}

.animated-button .arr-2 {
left: -25%;
}

.animated-button .circle {
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
width: 12px;
height: 12px;
background-color: #c5e5e4;
border-radius: 50%;
opacity: 0;
transition: all 0.8s cubic-bezier(0.23,1,0.32,1);
}

.animated-button .text {
position: relative;
z-index: 1;
transform: translateX(-10px);
margin-right: 8px;
transition: all 0.8s cubic-bezier(0.23,1,0.32,1);
}

.animated-button:hover {
box-shadow: 0 0 0 8px transparent;
border-radius: 12px;
}

.animated-button:hover .arr-1 {
right: -25%;
}

.animated-button:hover .arr-2 {
left: 10px;
}

.animated-button:hover .text {
transform: translateX(8px);
}

.animated-button:hover .circle {
width: 140px;
height: 140px;
opacity: 1;
}

/* CARD STYLE */

.card-container{
display:flex;
flex-wrap:wrap;
justify-content:center;
gap:24px;
}

.card-modern{
display:flex;
flex-direction:column;
width:320px;
border-radius:12px;
overflow:hidden;
background:linear-gradient(to right,#ffffff,#ECE9E6);
box-shadow:0 4px 15px rgba(0,0,0,0.1);
transition:0.3s;
text-decoration:none;
color:inherit;
}

.card-modern:hover{
transform:translateY(-6px);
box-shadow:0 10px 30px rgba(0,0,0,0.15);
}

.card-image{
width:100%;
height:200px;
object-fit:cover;
}

.card-body{
padding:16px;
display:flex;
flex-direction:column;
gap:6px;
}

.tag{
align-self:flex-start;
padding:4px 12px;
border-radius:999px;
font-size:12px;
color:white;
background:linear-gradient(to bottom,#2F80ED,#56CCF2);
}

.card-title{
font-size:20px;
font-weight:700;
}

.card-desc{
font-size:14px;
color:#555;
}

.card-footer{
display:flex;
align-items:center;
padding:16px;
margin-top:auto;
}

.user{
display:flex;
gap:8px;
align-items:center;
}

.user-image{
width:40px;
height:40px;
border-radius:50%;
}

.user-info small{
color:#666;
}

</style>

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

<a href="{{ route('login') }}" class="animated-button">

<svg xmlns="http://www.w3.org/2000/svg" class="arr-2" viewBox="0 0 24 24">
<path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
</svg>

<span class="text">LOGIN</span>

<span class="circle"></span>

<svg xmlns="http://www.w3.org/2000/svg" class="arr-1" viewBox="0 0 24 24">
<path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
</svg>

</a>

</div>

</div>

</div>

</nav>

<!-- SLIDESHOW -->

<div class="relative w-full h-[400px] overflow-hidden">

<img src="{{ asset('slide1.jpg') }}" class="slide w-full h-full object-cover">
<img src="{{ asset('slide2.jpg') }}" class="slide w-full h-full object-cover">
<img src="{{ asset('slide3.jpg') }}" class="slide w-full h-full object-cover">

</div>

<!-- HEADER -->

<div class="text-center py-10 bg-white shadow">

<h1 class="text-3xl font-bold">
Daftar Kegiatan
</h1>

<p class="text-gray-500 mt-2">
Kegiatan terbaru yang telah dipublikasikan
</p>

</div>

<!-- KEGIATAN -->

<div class="max-w-6xl mx-auto p-6">

<!-- FILTER -->
<div class="flex justify-center">

<form method="GET" class="mb-6 flex flex-wrap gap-4 items-end">

<!-- FILTER BIDANG -->
<div class="flex flex-col">
<label class="text-sm text-gray-600 mb-1">
Bidang
</label>

<select name="bidang" class="border rounded px-3 py-2">

<option value="">Semua Bidang</option>

@foreach($bidangs as $bidang)

<option value="{{ $bidang->id }}"
{{ request('bidang') == $bidang->id ? 'selected' : '' }}>
{{ $bidang->nama }}
</option>

@endforeach

</select>
</div>

<!-- TANGGAL MULAI -->
<div class="flex flex-col">
<label class="text-sm text-gray-600 mb-1">
Dari Tanggal
</label>

<input
type="date"
name="tanggal_mulai"
value="{{ request('tanggal_mulai') }}"
class="border rounded px-3 py-2"
>
</div>

<!-- TANGGAL SELESAI -->
<div class="flex flex-col">
<label class="text-sm text-gray-600 mb-1">
Sampai Tanggal
</label>

<input
type="date"
name="tanggal_selesai"
value="{{ request('tanggal_selesai') }}"
class="border rounded px-3 py-2"
>
</div>

<!-- BUTTON -->
<div class="flex gap-2">
<button class="bg-blue-950 text-white px-4 py-2 rounded hover:bg-blue-700">
Filter
</button>

<a href="/" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
Reset
</a>
</div>

</form>

</div>

<!-- KEGIATAN -->

<div class="card-container">

@foreach($kegiatans as $kegiatan)

<a href="/detail-kegiatan/{{ $kegiatan->id }}" class="card-modern">

<div>

@if($kegiatan->foto)
<img src="{{ asset('storage/'.$kegiatan->foto) }}" class="card-image">
@endif

</div>

<div class="card-body">

<span class="tag">
{{ $kegiatan->bidang->nama ?? 'Bidang' }}
</span>

<h4 class="card-title">
{{ $kegiatan->judul }}
</h4>

<p class="card-desc">
{{ Str::limit($kegiatan->deskripsi,120) }}
</p>

</div>

<div class="card-footer">

<div class="user">

<img src="{{ asset('Logo_Ditjen_Imigrasi.png') }}" class="user-image">

<div class="user-info">

<h5>Kanwil Imigrasi</h5>

<small>
{{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M Y') }}
</small>

</div>

</div>

</div>

</a>

@endforeach

</div>

</div>

<div class="mt-10 flex justify-center">
<div class="bg-white shadow rounded-lg px-6 py-3">
{{ $kegiatans->withQueryString()->links() }}
</div>
</div>

<!-- STATISTIK CARD -->

<div class="max-w-6xl mx-auto p-6">

<div class="grid md:grid-cols-2 gap-6">

<div class="bg-white shadow rounded p-6 text-center">
<p class="text-gray-500">Total Kegiatan</p>
<h2 class="text-3xl font-bold text-black">
{{ $totalKegiatan }}
</h2>
</div>

<div class="bg-white shadow rounded p-6 text-center">
<p class="text-gray-500">Kegiatan Bulan Ini</p>
<h2 class="text-3xl font-bold text-black">
{{ $kegiatanBulanIni }}
</h2>
</div>

</div>

</div>

<!-- GRAFIK KEGIATAN -->

<div class="max-w-6xl mx-auto p-6">

<div class="bg-white rounded shadow p-6">

<h2 class="text-2xl font-bold mb-6 text-center">
Statistik Kegiatan
</h2>

<div class="grid md:grid-cols-2 gap-10">

<div>
<h3 class="text-center font-semibold mb-3">
Jumlah Kegiatan per Bidang (Bulan Ini)
</h3>

<canvas id="chartBidang"></canvas>
</div>

<div>
<h3 class="text-center font-semibold mb-3">
Jumlah Kegiatan dalam 1 Tahun
</h3>

<canvas id="chartBulan"></canvas>
</div>

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

<script>

let slideIndex = 0;
showSlides();

function showSlides() {

let slides = document.getElementsByClassName("slide");

for (let i = 0; i < slides.length; i++) {
slides[i].style.display = "none";
}

slideIndex++;

if (slideIndex > slides.length) {
slideIndex = 1;
}

slides[slideIndex-1].style.display = "block";

setTimeout(showSlides, 3000);

}

</script>

<script>

const bidangLabels = @json($bidangLabels ?? []);
const bidangData = @json($bidangData ?? []);

const bulanLabels = @json($bulanLabels ?? []);
const bulanData = @json($bulanData ?? []);

new Chart(document.getElementById('chartBidang'), {
type: 'pie',
data: {
labels: bidangLabels,
datasets: [{
label: 'Jumlah Kegiatan',
data: bidangData,
backgroundColor: [
'#3b82f6',
'#22c55e',
'#f59e0b',
'#ef4444',
'#8b5cf6'
]
}]
}
});

new Chart(document.getElementById('chartBulan'), {
type: 'line',
data: {
labels: bulanLabels,
datasets: [{
label: 'Jumlah Kegiatan',
data: bulanData,
borderColor: '#16a34a',
backgroundColor: '#16a34a',
fill: false
}]
}
});

</script>

</body>
</html>