<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\DashboardController;
use App\Models\Kegiatan;
use App\Models\Bidang;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Halaman Publik
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $bidangFilter = request('bidang');
    $tanggalMulai = request('tanggal_mulai');
    $tanggalSelesai = request('tanggal_selesai');

    $query = Kegiatan::query();

    if ($bidangFilter) {
        $query->where('bidang_id', $bidangFilter);
    }
    if ($tanggalMulai) {
    $query->whereDate('tanggal', '>=', $tanggalMulai);
    }

    if ($tanggalSelesai) {
        $query->whereDate('tanggal', '<=', $tanggalSelesai);
    }

    $kegiatans = $query->orderBy('tanggal', 'desc')->paginate(9);

    $totalKegiatan = DB::table('kegiatans')->count();

    $kegiatanBulanIni = DB::table('kegiatans')
        ->whereMonth('tanggal', date('m'))
        ->count();

$totalBidang = DB::table('bidangs')->count();

$bidangs = Bidang::all();

    // Statistik kegiatan per bidang dalam bulan ini
    $bidang = DB::table('kegiatans')
    ->join('bidangs', 'kegiatans.bidang_id', '=', 'bidangs.id')
    ->whereMonth('kegiatans.tanggal', date('m'))
    ->select('bidangs.nama as bidang', DB::raw('count(*) as total'))
    ->groupBy('bidangs.nama')
    ->orderByRaw("
        FIELD(bidangs.nama,
        'Kakanwil',
        'Kabagtum',
        'Intelpatnal',
        'Wasdakim',
        'Dokjalintalstatuskim'
        )
    ")
    ->get();

    $bidangLabels = $bidang->pluck('bidang');
    $bidangData = $bidang->pluck('total');

    // Statistik kegiatan per bulan dalam 1 tahun
    $bulan = DB::table('kegiatans')
        ->select(DB::raw('MONTH(tanggal) as bulan'), DB::raw('count(*) as total'))
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();

    $bulanLabels = [
    'Jan','Feb','Mar','Apr','Mei','Jun',
    'Jul','Agu','Sep','Okt','Nov','Des'
    ];

    $bulanData = array_fill(0,12,0);

    foreach ($bulan as $b) {
        $bulanData[$b->bulan - 1] = $b->total;
    }

    return view('welcome', compact(
    'kegiatans',
    'bidangs',
    'bidangLabels',
    'bidangData',
    'bulanLabels',
    'bulanData',
    'totalKegiatan',
    'kegiatanBulanIni',
    'totalBidang'
));

});
    
Route::get('/detail-kegiatan/{id}', function ($id) {

    $kegiatan = Kegiatan::with('bidang')->findOrFail($id);

    return view('detail', compact('kegiatan'));

});

/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
    Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');

    Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
    Route::put('/kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
    Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';