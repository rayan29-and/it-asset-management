<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Maintenance;
use App\Models\Aset;

class MaintenanceController extends Controller
{
    public function index(Request $request)
    {
        $query = Maintenance::with('aset')
            ->whereHas('aset', function ($q) {
                $q->where('user_id', Auth::id());
            });

        // Pencarian
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('keluhan', 'like', '%' . $search . '%')
                    ->orWhere('teknisi', 'like', '%' . $search . '%')
                    ->orWhereHas('aset', function ($asetQuery) use ($search) {
                        $asetQuery->where('kode_aset', 'like', '%' . $search . '%')
                            ->orWhere('nama_aset', 'like', '%' . $search . '%');
                    });
            });
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $maintenance = $query
            ->latest('tanggal_masuk')
            ->get();

        return view('maintenance.index', compact('maintenance'));
    }

    public function create()
    {
        // Hanya menampilkan aset milik user yang sedang login
        $aset = Aset::where('user_id', Auth::id())
            ->orderBy('nama_aset')
            ->get();

        return view('maintenance.create', compact('aset'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aset_id' => [
                'required',
                Rule::exists('aset', 'id')
                    ->where(function ($query) {
                        $query->where('user_id', Auth::id());
                    }),
            ],

            'tanggal_masuk' => 'required|date',

            'keluhan' => 'required|string',

            'tindakan' => 'nullable|string',

            'teknisi' => 'nullable|string|max:255',

            'tanggal_selesai' => [
                'nullable',
                'date',
                'after_or_equal:tanggal_masuk',
                'required_if:status,Selesai',
            ],

            'status' => 'required|in:Proses,Selesai',

            'keterangan' => 'nullable|string',
        ]);

        $maintenance = Maintenance::create([
            'aset_id' => $request->aset_id,
            'tanggal_masuk' => $request->tanggal_masuk,
            'keluhan' => $request->keluhan,
            'tindakan' => $request->tindakan,
            'teknisi' => $request->teknisi,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        // Ambil aset milik user yang sedang login
        $aset = Aset::where('user_id', Auth::id())
            ->findOrFail($request->aset_id);

        // Jika maintenance masih dalam proses
        if ($request->status === 'Proses') {
            $aset->update([
                'status' => 'Maintenance',
                'lokasi' => 'Ruang IT',
            ]);
        }

        // Jika langsung selesai
        if ($request->status === 'Selesai') {
            $aset->update([
                'status' => 'Tidak Aktif',
                'lokasi' => 'Ruang IT',
            ]);
        }

        return redirect('/maintenance')->with(
            'success',
            'Data maintenance berhasil ditambahkan.'
        );
    }

    public function show($id)
    {
        // Hanya bisa melihat maintenance dari aset milik user sendiri
        $maintenance = Maintenance::with('aset.kategori')
            ->whereHas('aset', function ($q) {
                $q->where('user_id', Auth::id());
            })
            ->findOrFail($id);

        return view('maintenance.show', compact('maintenance'));
    }

    public function edit($id)
    {
        // Hanya maintenance dari aset milik user sendiri
        $maintenance = Maintenance::with('aset')
            ->whereHas('aset', function ($q) {
                $q->where('user_id', Auth::id());
            })
            ->findOrFail($id);

        // Dropdown hanya berisi aset milik user sendiri
        $aset = Aset::where('user_id', Auth::id())
            ->orderBy('nama_aset')
            ->get();

        return view(
            'maintenance.edit',
            compact('maintenance', 'aset')
        );
    }

    public function update(Request $request, $id)
    {
        // Pastikan maintenance yang diedit milik user yang sedang login
        $maintenance = Maintenance::whereHas('aset', function ($q) {
                $q->where('user_id', Auth::id());
            })
            ->findOrFail($id);

        $request->validate([
            'aset_id' => [
                'required',
                Rule::exists('aset', 'id')
                    ->where(function ($query) {
                        $query->where('user_id', Auth::id());
                    }),
            ],

            'tanggal_masuk' => 'required|date',

            'keluhan' => 'required|string',

            'tindakan' => 'nullable|string',

            'teknisi' => 'nullable|string|max:255',

            'tanggal_selesai' => [
                'nullable',
                'date',
                'after_or_equal:tanggal_masuk',
                'required_if:status,Selesai',
            ],

            'status' => 'required|in:Proses,Selesai',

            'keterangan' => 'nullable|string',
        ]);

        // Simpan ID aset sebelum perubahan
        $asetLamaId = $maintenance->aset_id;

        // ID aset baru
        $asetBaruId = $request->aset_id;

        // Update data maintenance
        $maintenance->update([
            'aset_id' => $asetBaruId,
            'tanggal_masuk' => $request->tanggal_masuk,
            'keluhan' => $request->keluhan,
            'tindakan' => $request->tindakan,
            'teknisi' => $request->teknisi,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Jika aset diganti
        |--------------------------------------------------------------------------
        */

        if ($asetLamaId != $asetBaruId) {
            $asetLama = Aset::where('user_id', Auth::id())
                ->find($asetLamaId);

            if ($asetLama) {
                $masihMaintenance = Maintenance::where(
                        'aset_id',
                        $asetLama->id
                    )
                    ->where('status', 'Proses')
                    ->exists();

                if (!$masihMaintenance) {
                    $asetLama->update([
                        'status' => 'Tidak Aktif',
                        'lokasi' => 'Ruang IT',
                    ]);
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Sinkronisasi status aset baru
        |--------------------------------------------------------------------------
        */

        $aset = Aset::where('user_id', Auth::id())
            ->findOrFail($asetBaruId);

        if ($request->status === 'Proses') {
            $aset->update([
                'status' => 'Maintenance',
                'lokasi' => 'Ruang IT',
            ]);
        } elseif ($request->status === 'Selesai') {
            $aset->update([
                'status' => 'Tidak Aktif',
                'lokasi' => 'Ruang IT',
            ]);
        }

        return redirect('/maintenance/' . $maintenance->id)
            ->with(
                'success',
                'Data maintenance berhasil diperbarui.'
            );
    }

    public function destroy($id)
    {
        // Pastikan maintenance yang dihapus milik user sendiri
        $maintenance = Maintenance::whereHas('aset', function ($q) {
                $q->where('user_id', Auth::id());
            })
            ->findOrFail($id);

        // Simpan aset yang terkait sebelum maintenance dihapus
        $aset = Aset::where('user_id', Auth::id())
            ->find($maintenance->aset_id);

        // Cek apakah maintenance yang dihapus masih berstatus Proses
        $statusProses = $maintenance->status === 'Proses';

        // Hapus data maintenance
        $maintenance->delete();

        /*
        |--------------------------------------------------------------------------
        | Kembalikan status aset jika tidak ada maintenance Proses lainnya
        |--------------------------------------------------------------------------
        */

        if ($aset && $statusProses) {
            $masihMaintenance = Maintenance::where(
                    'aset_id',
                    $aset->id
                )
                ->where('status', 'Proses')
                ->exists();

            if (!$masihMaintenance) {
                $aset->update([
                    'status' => 'Tidak Aktif',
                    'lokasi' => 'Ruang IT',
                ]);
            }
        }

        return redirect('/maintenance')->with(
            'success',
            'Data maintenance berhasil dihapus.'
        );
    }
}