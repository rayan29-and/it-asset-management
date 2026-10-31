<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\KategoriAset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AsetController extends Controller
{
    /**
     * Menampilkan daftar aset milik user yang sedang login.
     */
    public function index(Request $request)
    {
        $query = Aset::with('kategori')
            ->where('user_id', Auth::id());

        // Pencarian
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('kode_aset', 'like', '%' . $search . '%')
                    ->orWhere('nama_aset', 'like', '%' . $search . '%')
                    ->orWhere('pengguna', 'like', '%' . $search . '%')
                    ->orWhere('lokasi', 'like', '%' . $search . '%');
            });
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $aset = $query
            ->latest()
            ->get();

        return view('aset.index', compact('aset'));
    }


    /**
     * Menampilkan form tambah aset.
     * Hanya menampilkan kategori milik user yang sedang login.
     */
    public function create()
    {
        $kategori = KategoriAset::where('user_id', Auth::id())
            ->orderBy('nama_kategori')
            ->get();

        return view('aset.create', compact('kategori'));
    }


    /**
     * Menyimpan aset baru milik user yang sedang login.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_aset' => [
                'required',
                'string',
                'max:255',
                Rule::unique('aset', 'kode_aset'),
            ],

            'nama_aset' => 'required|string|max:255',

            'kategori_id' => [
                'required',
                Rule::exists('kategori_aset', 'id')
                    ->where(function ($query) {
                        $query->where('user_id', Auth::id());
                    }),
            ],

            'merk' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'nomor_seri' => 'nullable|string|max:255',

            'pengguna' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',

            'tanggal_perolehan' => 'nullable|date',

            'kondisi' => [
                'required',
                'in:Baik,Rusak Ringan,Rusak Berat',
            ],

            'status' => [
                'required',
                'in:Aktif,Maintenance,Tidak Aktif',
            ],

            'keterangan' => 'nullable|string',

            'foto' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        // Simpan foto
        $foto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')
                ->store('aset', 'public');
        }

        // Simpan aset
        Aset::create([
            'user_id' => Auth::id(),

            'kode_aset' => $request->kode_aset,
            'nama_aset' => $request->nama_aset,
            'kategori_id' => $request->kategori_id,

            'merk' => $request->merk,
            'model' => $request->model,
            'nomor_seri' => $request->nomor_seri,

            'pengguna' => $request->pengguna,
            'lokasi' => $request->lokasi,

            'tanggal_perolehan' => $request->tanggal_perolehan,

            'kondisi' => $request->kondisi,
            'status' => $request->status,

            'keterangan' => $request->keterangan,
            'foto' => $foto,
        ]);

        return redirect('/aset')
            ->with('success', 'Aset berhasil ditambahkan.');
    }


    /**
     * Menampilkan detail aset.
     * Hanya aset milik user yang sedang login.
     */
    public function show($id)
    {
        $aset = Aset::with([
            'kategori',
            'maintenance' => function ($query) {
                $query->latest('tanggal_masuk');
            }
        ])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('aset.show', compact('aset'));
    }


    /**
     * Menampilkan form edit aset.
     * Hanya aset dan kategori milik user yang sedang login.
     */
    public function edit($id)
    {
        $aset = Aset::where('user_id', Auth::id())
            ->findOrFail($id);

        $kategori = KategoriAset::where('user_id', Auth::id())
            ->orderBy('nama_kategori')
            ->get();

        return view('aset.edit', compact('aset', 'kategori'));
    }


    /**
     * Memperbarui aset.
     */
    public function update(Request $request, $id)
    {
        $aset = Aset::where('user_id', Auth::id())
            ->findOrFail($id);

        $request->validate([
            'kode_aset' => [
                'required',
                'string',
                'max:255',
                Rule::unique('aset', 'kode_aset')
                    ->ignore($aset->id),
            ],

            'nama_aset' => 'required|string|max:255',

            'kategori_id' => [
                'required',
                Rule::exists('kategori_aset', 'id')
                    ->where(function ($query) {
                        $query->where('user_id', Auth::id());
                    }),
            ],

            'merk' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'nomor_seri' => 'nullable|string|max:255',

            'pengguna' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',

            'tanggal_perolehan' => 'nullable|date',

            'kondisi' => [
                'required',
                'in:Baik,Rusak Ringan,Rusak Berat',
            ],

            'status' => [
                'required',
                'in:Aktif,Maintenance,Tidak Aktif',
            ],

            'keterangan' => 'nullable|string',

            'foto' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        // Foto lama
        $foto = $aset->foto;

        // Jika upload foto baru
        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if ($aset->foto) {
                Storage::disk('public')
                    ->delete($aset->foto);
            }

            // Simpan foto baru
            $foto = $request->file('foto')
                ->store('aset', 'public');
        }

        $aset->update([
            'kode_aset' => $request->kode_aset,
            'nama_aset' => $request->nama_aset,
            'kategori_id' => $request->kategori_id,

            'merk' => $request->merk,
            'model' => $request->model,
            'nomor_seri' => $request->nomor_seri,

            'pengguna' => $request->pengguna,
            'lokasi' => $request->lokasi,

            'tanggal_perolehan' => $request->tanggal_perolehan,

            'kondisi' => $request->kondisi,
            'status' => $request->status,

            'keterangan' => $request->keterangan,
            'foto' => $foto,
        ]);

        return redirect('/aset/' . $aset->id)
            ->with('success', 'Data aset berhasil diperbarui.');
    }


    /**
     * Menghapus aset.
     * Hanya aset milik user yang sedang login.
     */
    public function destroy($id)
    {
        $aset = Aset::where('user_id', Auth::id())
            ->findOrFail($id);

        // Hapus foto aset jika ada
        if ($aset->foto) {
            Storage::disk('public')
                ->delete($aset->foto);
        }

        $aset->delete();

        return redirect('/aset')
            ->with('success', 'Aset berhasil dihapus.');
    }
}