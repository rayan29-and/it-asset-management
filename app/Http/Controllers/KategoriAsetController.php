<?php

namespace App\Http\Controllers;

use App\Models\KategoriAset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriAsetController extends Controller
{
    /**
     * Menampilkan kategori milik user yang sedang login.
     */
    public function index()
    {
        $kategori = KategoriAset::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('kategori-aset.index', compact('kategori'));
    }


    /**
     * Menampilkan form tambah kategori.
     */
    public function create()
    {
        return view('kategori-aset.create');
    }


    /**
     * Menyimpan kategori milik user yang sedang login.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
        ]);

        KategoriAset::create([
            'user_id' => Auth::id(),
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/kategori-aset')
            ->with(
                'success',
                'Kategori aset berhasil ditambahkan.'
            );
    }


    /**
     * Menampilkan form edit kategori.
     * Hanya kategori milik user yang sedang login.
     */
    public function edit($id)
    {
        $kategori = KategoriAset::where('user_id', Auth::id())
            ->findOrFail($id);

        return view(
            'kategori-aset.edit',
            compact('kategori')
        );
    }


    /**
     * Memperbarui kategori.
     */
    public function update(Request $request, $id)
    {
        $kategori = KategoriAset::where('user_id', Auth::id())
            ->findOrFail($id);

        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
        ]);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/kategori-aset')
            ->with(
                'success',
                'Kategori aset berhasil diperbarui.'
            );
    }


    /**
     * Menghapus kategori.
     */
    public function destroy($id)
    {
        $kategori = KategoriAset::where('user_id', Auth::id())
            ->findOrFail($id);

        $kategori->delete();

        return redirect('/kategori-aset')
            ->with(
                'success',
                'Kategori aset berhasil dihapus.'
            );
    }
}