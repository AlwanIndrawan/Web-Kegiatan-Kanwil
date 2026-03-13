<x-app-layout>

<div class="p-6">

    <h2 class="text-xl font-bold mb-4">Daftar Kegiatan</h2>

    <table class="w-full border">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2 border">Bidang</th>
                <th class="p-2 border">Judul</th>
                <th class="p-2 border">Tanggal</th>
                <th class="p-2 border text-center">Foto</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>

        <tbody>
        @forelse($kegiatans as $kegiatan)
            <tr>

                <td class="p-2 border">
                    {{ $kegiatan->bidang->nama }}
                </td>

                <td class="p-2 border">
                    {{ $kegiatan->judul }}
                </td>

                <td class="p-2 border">
                    {{ $kegiatan->tanggal }}
                </td>

                <td class="p-2 border text-center">

                    @if($kegiatan->foto)

                     <img 
                        src="{{ asset('storage/'.$kegiatan->foto) }}"
                        class="h-16 mx-auto cursor-pointer"
                        onclick="showImage(this.src)">

                    @else

                        <span class="text-gray-400 text-sm">
                            Tidak ada
                        </span>

                    @endif

                </td>

                <td class="p-2 border space-x-2">

                    <a href="{{ route('kegiatan.edit', $kegiatan->id) }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">
                        Edit
                    </a>

                    <form id="delete-form-{{ $kegiatan->id }}"
                        action="{{ route('kegiatan.destroy', $kegiatan->id) }}"
                        method="POST"
                        class="inline">

                        @csrf
                        @method('DELETE')

                        <button type="button"
                            onclick="confirmDelete('{{ $kegiatan->id }}')"
                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="5" class="p-2 text-center">
                    Belum ada kegiatan
                </td>
            </tr>

        @endforelse
        </tbody>

    </table>

</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>

function confirmDelete(id) {

    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Data kegiatan akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {

        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }

    })

}


function showImage(url){

    Swal.fire({
        imageUrl: url,
        imageWidth: 800,
        imageAlt: 'Foto kegiatan',
        showConfirmButton: false,
        showCloseButton: true
    })

}

</script>

</x-app-layout>