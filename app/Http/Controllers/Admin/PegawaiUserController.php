<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PegawaiUserController extends Controller
{
    public function index(): View
    {
        $users = User::where('role', 'pegawai')->get();
        return view('admin.modul.pegawai.management', compact('users'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make('shifa2024'),
            'foto' => 'avatar-default.png',
        ]);
        // event(new Registered($users));
        return redirect()->route('admin.management.index')->with(['success' => 'Data berhasil disimpan!']);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // Validasi data
        $request->validate([
            'nip' => ['required', 'string', 'min:18', 'max:18', 'unique:users,nip,' . $id],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $id],
            'status' => ['string', 'max:255'],
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048', // tambahkan nullable
        ]);

        // Temukan user berdasarkan ID
        $user = User::findOrFail($id);

        // Validasi dan penanganan unggah foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto && $user->foto != 'avatar-default.png') {
                Storage::delete('public/foto/' . $user->foto);
            }

            // Simpan foto baru
            $foto = $request->file('foto');
            $user->foto = $foto->hashName();
            $foto->storeAs('public/foto', $user->foto);
        }

        // Perbarui data user
        $user->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
            'status' => $request->status,
            'foto' => $user->foto, // tambahkan ini untuk memastikan foto terupdate
        ]);

        return redirect()->route('admin.kepala-sekolah.index')->with(['success' => 'Data berhasil diperbarui!']);
    }

    public function destroy(Request $request): RedirectResponse
    {
        User::destroy($request->id);
        return redirect()->route('admin.management.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
