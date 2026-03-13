<x-app-layout>

<div class="p-6">

<h2 class="text-xl font-bold mb-4">Edit Kegiatan</h2>

@if ($errors->any())
<div class="bg-red-200 text-red-800 p-3 mb-4 rounded">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form action="{{ route('kegiatan.update',$kegiatan->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

{{-- SUPERADMIN BISA UBAH BIDANG --}}
@if(auth()->user()->role == 'superadmin')

<div class="mb-4">
<label class="block mb-1">Bidang</label>

<select name="bidang_id" class="w-full border p-2 rounded">

@foreach($bidangs as $bidang)

<option value="{{ $bidang->id }}"
{{ $kegiatan->bidang_id == $bidang->id ? 'selected' : '' }}>

{{ $bidang->nama }}

</option>

@endforeach

</select>

</div>

@endif

<div class="mb-4">
<label class="block mb-1">Judul</label>

<input type="text"
name="judul"
value="{{ old('judul',$kegiatan->judul) }}"
class="w-full border p-2 rounded">

</div>

<div class="mb-4">
<label class="block mb-1">Tanggal</label>

<input type="date"
name="tanggal"
value="{{ old('tanggal',$kegiatan->tanggal) }}"
class="w-full border p-2 rounded">

</div>

<div class="mb-4">

<label class="block mb-2">Foto Lama</label>

@if($kegiatan->foto)

<img src="{{ asset('storage/'.$kegiatan->foto) }}" width="200" class="mb-2 rounded">

@else

<p>Tidak ada foto</p>

@endif

</div>

<div class="mb-4">
<label class="block mb-1">Ganti Foto</label>
<input type="file" name="foto" class="w-full border p-2 rounded">
</div>

<div class="mb-4">

<label class="block mb-1">Deskripsi</label>

<textarea name="deskripsi" class="w-full border p-2 rounded">{{ old('deskripsi',$kegiatan->deskripsi) }}</textarea>

</div>

<button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
Update Kegiatan
</button>

</form>

</div>

</x-app-layout>