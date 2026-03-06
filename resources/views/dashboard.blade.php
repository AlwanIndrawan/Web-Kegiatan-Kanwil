<x-app-layout>

<div class="p-6">

    <h1 class="text-2xl font-bold text-gray-800 mb-6">
        Dashboard Sistem Kegiatan Kanwil
    </h1>

    {{-- STATISTIK --}}
<div class="grid grid-cols-4 gap-6 mb-8">

    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-gray-500 text-sm">Total Kegiatan</p>
        <h2 class="text-3xl font-bold">{{ $totalKegiatan }}</h2>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-gray-500 text-sm">Total Bidang</p>
        <h2 class="text-3xl font-bold">{{ $totalBidang }}</h2>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-gray-500 text-sm">Hari Ini</p>
        <h2 class="text-3xl font-bold">{{ $kegiatanHariIni }}</h2>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-gray-500 text-sm">Bulan Ini</p>
        <h2 class="text-3xl font-bold">{{ $kegiatanBulanIni }}</h2>
    </div>

</div>

    {{-- KEGIATAN TERBARU --}}
    <div class="bg-white shadow rounded-xl p-6">

        <h2 class="text-lg font-bold text-gray-700 mb-4">
            Kegiatan Terbaru
        </h2>

        <table class="w-full border-collapse">

            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-3">Bidang</th>
                    <th class="p-3">Judul</th>
                    <th class="p-3">Tanggal</th>
                </tr>
            </thead>

            <tbody>

                @foreach($kegiatans as $kegiatan)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-3">
                        {{ $kegiatan->bidang->nama }}
                    </td>

                    <td class="p-3">
                        {{ $kegiatan->judul }}
                    </td>

                    <td class="p-3">
                        {{ $kegiatan->tanggal }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</x-app-layout>