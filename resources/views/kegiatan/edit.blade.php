<x-app-layout>

<div class="p-6">

<h2 class="text-xl font-bold mb-4">Edit Kegiatan</h2>

<form action="{{ route('kegiatan.update',$kegiatan->id) }}" method="POST">
@csrf
@method('PUT')

<div class="mb-4">
<label class="block mb-1">Judul</label>
<input type="text" name="judul"
value="{{ $kegiatan->judul }}"
class="w-full border p-2 rounded">
</div>

<div class="mb-4">
<label class="block mb-1">Tanggal</label>
<input type="date" name="tanggal"
value="{{ $kegiatan->tanggal }}"
class="w-full border p-2 rounded">
</div>

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

<button class="bg-blue-600 text-white px-4 py-2 rounded">
Update Kegiatan
</button>

</form>

</div>

</x-app-layout>