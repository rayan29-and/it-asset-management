<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Aset;
use App\Models\KategoriAset;
use App\Models\Maintenance;

class DashboardController extends Controller
{
    public function index()
    {
        // ID user yang sedang login
        $userId = Auth::id();

        // Statistik aset
        $totalAset = Aset::where('user_id', $userId)->count();

        $asetAktif = Aset::where('user_id', $userId)
            ->where('status', 'Aktif')
            ->count();

        $asetMaintenance = Aset::where('user_id', $userId)
            ->where('status', 'Maintenance')
            ->count();

        $asetTidakAktif = Aset::where('user_id', $userId)
            ->where('status', 'Tidak Aktif')
            ->count();

        // Statistik kategori
        $totalKategori = KategoriAset::where('user_id', $userId)
            ->count();

        // Total riwayat maintenance
        // Maintenance tidak memiliki user_id,
        // sehingga difilter melalui aset milik user.
        $totalMaintenance = Maintenance::whereHas('aset', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->count();

        // 3 aset terbaru milik user
        $asetTerbaru = Aset::with('kategori')
            ->where('user_id', $userId)
            ->latest()
            ->take(3)
            ->get();

        // 3 maintenance terbaru milik user
        $maintenanceTerbaru = Maintenance::with('aset')
            ->whereHas('aset', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            })
            ->latest('tanggal_masuk')
            ->take(3)
            ->get();

        return view('dashboard', compact(
            'totalAset',
            'asetAktif',
            'asetMaintenance',
            'asetTidakAktif',
            'totalKategori',
            'totalMaintenance',
            'asetTerbaru',
            'maintenanceTerbaru'
        ));
    }
}