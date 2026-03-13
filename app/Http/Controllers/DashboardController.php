<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Bidang;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKegiatan = Kegiatan::count();
        $totalBidang = Bidang::count();
        $kegiatanHariIni = Kegiatan::whereDate('tanggal', now())->count();
        $kegiatanBulanIni = Kegiatan::whereMonth('tanggal', now()->month)->count();
        $kegiatans = Kegiatan::with('bidang')->latest()->limit(5)->get();   

        return view('dashboard', compact(
    'totalKegiatan',
    'totalBidang',
    'kegiatanHariIni',
    'kegiatanBulanIni',
    'kegiatans'
));
    }
}