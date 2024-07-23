<?php

namespace App\Http\Controllers\Kepala_Sekolah;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    const DEFAULT_PHOTO = 'avatar-default.png';

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('kepala-sekolah.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Validasi dan penanganan unggah foto
        $request->validate([
            'foto' => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada dan bukan foto default
            if ($user->foto && $user->foto !== self::DEFAULT_PHOTO) {
                Storage::delete('public/foto/' . $user->foto);
            }

            // Simpan foto baru
            $foto = $request->file('foto');
            $user->foto = $foto->hashName();
            $foto->storeAs('public/foto', $user->foto);
        }

        // Mengisi atribut dari data yang telah divalidasi
        $user->fill($request->validated());

        // Mereset verifikasi email jika email diubah
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Menyimpan perubahan pada model user
        $user->save();

        return redirect()->route('kepala_sekolah.profile.edit')->with(['success' => 'Profil berhasil diperbarui!']);
    }
}
