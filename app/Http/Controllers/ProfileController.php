<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Aset;
use App\Models\Maintenance;
use App\Models\KategoriAset;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('profile.index', compact('user'));
    }

    public function settings()
    {
        $user = Auth::user();

        return view('profile.settings', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:100',

            'username' => [
                'required',
                'string',
                'max:50',
                Rule::unique('users', 'username')->ignore($user->id),
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            'bio' => 'nullable|string|max:500',

            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'bio.max' => 'Bio maksimal 500 karakter.',
            'profile_photo.image' => 'File yang dipilih harus berupa gambar.',
            'profile_photo.mimes' => 'Foto harus berformat JPG, JPEG, PNG, atau WEBP.',
            'profile_photo.max' => 'Ukuran foto maksimal 2 MB.',
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->bio = $request->bio;

        /*
        |--------------------------------------------------------------------------
        | Upload Foto Profil
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_photo')) {

            // Hapus foto lama milik user yang sedang login
            if ($user->profile_photo) {

                Storage::disk('public')
                    ->delete($user->profile_photo);
            }

            // Simpan foto baru
            $path = $request->file('profile_photo')
                ->store('profile-photos', 'public');

            $user->profile_photo = $path;
        }

        $user->save();

        return redirect('/profile')
            ->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ], [
            'current_password.required' => 'Password saat ini wajib diisi.',
            'password.required' => 'Password baru wajib diisi.',
            'password.min' => 'Password baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = Auth::user();

        if (!Hash::check(
            $request->current_password,
            $user->password
        )) {

            return back()->withErrors([
                'current_password' => 'Password saat ini salah.',
            ]);
        }

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('/profile')
            ->with('success', 'Password berhasil diubah.');
    }

    public function deletePhoto()
    {
        $user = Auth::user();

        if ($user->profile_photo) {

            Storage::disk('public')->delete(
                $user->profile_photo
            );

            $user->profile_photo = null;

            $user->save();
        }

        return redirect('/profile')
            ->with('success', 'Foto profil berhasil dihapus.');
    }

    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        DB::transaction(function () use ($user) {

            /*
            |--------------------------------------------------------------------------
            | Ambil semua aset milik user
            |--------------------------------------------------------------------------
            */

            $asetIds = Aset::where('user_id', $user->id)
                ->pluck('id');

            /*
            |--------------------------------------------------------------------------
            | Hapus maintenance milik aset user
            |--------------------------------------------------------------------------
            */

            Maintenance::whereIn('aset_id', $asetIds)
                ->delete();

            /*
            |--------------------------------------------------------------------------
            | Hapus foto aset milik user
            |--------------------------------------------------------------------------
            */

            $aset = Aset::where('user_id', $user->id)->get();

            foreach ($aset as $item) {

                if ($item->foto) {

                    Storage::disk('public')
                        ->delete($item->foto);
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Hapus seluruh aset milik user
            |--------------------------------------------------------------------------
            */

            Aset::where('user_id', $user->id)
                ->delete();

            /*
            |--------------------------------------------------------------------------
            | Hapus kategori milik user
            |--------------------------------------------------------------------------
            */

            KategoriAset::where('user_id', $user->id)
                ->delete();

            /*
            |--------------------------------------------------------------------------
            | Hapus foto profil user
            |--------------------------------------------------------------------------
            */

            if ($user->profile_photo) {

                Storage::disk('public')
                    ->delete($user->profile_photo);
            }

            /*
            |--------------------------------------------------------------------------
            | Hapus akun yang sedang login saja
            |--------------------------------------------------------------------------
            */

            $user->delete();
        });

        /*
        |--------------------------------------------------------------------------
        | Logout user
        |--------------------------------------------------------------------------
        */

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')
            ->with(
                'success',
                'Akun dan seluruh data milik akun berhasil dihapus.'
            );
    }
}