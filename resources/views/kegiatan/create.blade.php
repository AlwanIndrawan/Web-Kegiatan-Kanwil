<x-app-layout>

<div class="p-6">

<h2 class="text-xl font-bold mb-4">Tambah Kegiatan</h2>

@if(session('success'))
<div class="bg-green-200 p-2 mb-3 rounded">
{{ session('success') }}
</div>
@endif

@if ($errors->any())
<div class="bg-red-200 text-red-800 p-3 mb-4 rounded">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
@csrf

{{-- SUPERADMIN BISA PILIH BIDANG --}}
@if(auth()->user()->role == 'superadmin')

<div class="mb-3">
<label class="block mb-1">Bidang</label>

<select name="bidang_id" class="border p-2 w-full rounded">

@foreach($bidangs as $bidang)

<option value="{{ $bidang->id }}">
{{ $bidang->nama }}
</option>

@endforeach

</select>

</div>

@endif

<div class="mb-3">
<label class="block mb-1">Judul</label>
<input type="text" name="judul" class="border p-2 w-full rounded">
</div>

<div class="mb-3">
<label class="block mb-1">Tanggal</label>
<input type="date" name="tanggal" class="border p-2 w-full rounded">
</div>

<div class="mb-4">
<label class="block mb-1">Foto Kegiatan</label>
<input type="file" name="foto" class="border p-2 w-full rounded">
</div>

<div class="mb-3">
<label class="block mb-1">Deskripsi</label>
<textarea name="deskripsi" class="border p-2 w-full rounded"></textarea>
</div>

<button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
Simpan
</button>

</form>

</div>

</x-app-layout>