<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Maintenance;
use App\Models\Aset;

use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');

        // Hanya mengambil maintenance dari aset milik user yang login
        $query = Maintenance::with('aset')
            ->whereHas('aset', function ($q) {
                $q->where('user_id', Auth::id());
            });

        /*
        |--------------------------------------------------------------------------
        | FILTER 1
        | Hanya tanggal mulai yang diisi
        |--------------------------------------------------------------------------
        */

        if ($tanggalMulai && !$tanggalSelesai) {

            $query->whereDate(
                'tanggal_masuk',
                '=',
                $tanggalMulai
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER 2
        | Hanya tanggal selesai yang diisi
        |--------------------------------------------------------------------------
        */

        elseif (!$tanggalMulai && $tanggalSelesai) {

            $query->whereDate(
                'tanggal_selesai',
                '=',
                $tanggalSelesai
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER 3
        | Tanggal mulai dan tanggal selesai diisi
        |--------------------------------------------------------------------------
        |
        | Maintenance harus:
        | - Masuk pada/setelah tanggal mulai
        | - Selesai pada/sebelum tanggal selesai
        |
        */

        elseif ($tanggalMulai && $tanggalSelesai) {

            $query->whereDate(
                'tanggal_masuk',
                '>=',
                $tanggalMulai
            );

            $query->whereDate(
                'tanggal_selesai',
                '<=',
                $tanggalSelesai
            );
        }

        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA
        |--------------------------------------------------------------------------
        */

        $maintenance = $query
            ->orderBy('tanggal_masuk', 'desc')
            ->get();

        return view('laporan.index', compact('maintenance'));
    }

    public function asetPdf($id)
    {
        // Hanya mengambil aset milik user yang sedang login
        $aset = Aset::with([
            'kategori',
            'maintenance' => function ($query) {
                $query->where('status', 'Proses')
                    ->latest('tanggal_masuk');
            }
        ])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        // Hanya aset yang sedang Maintenance yang boleh dicetak
        if ($aset->status !== 'Maintenance') {
            abort(404);
        }

        // Ambil maintenance yang sedang Proses
        $maintenance = $aset->maintenance->first();

        // Jika tidak ada maintenance yang sedang Proses
        if (!$maintenance) {
            abort(404);
        }

        $pdf = Pdf::loadView(
            'laporan.pdf-aset',
            compact('aset', 'maintenance')
        );

        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream(
            'Laporan-Maintenance-' . $aset->kode_aset . '.pdf'
        );
    }
}