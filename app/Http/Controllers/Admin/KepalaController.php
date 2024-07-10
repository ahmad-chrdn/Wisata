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

class KepalaController extends Controller
{
    public function index(): View
    {
        $users = User::where('role', 'kepala sekolah')->get();
        return view('admin.modul.kepala-sekolah.kepala-data', compact('users'));
    }

    public function create(): View
    {
        return view('admin.modul.kepala-sekolah.kepala-create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nip' => ['required', 'string', 'min:18', 'max:18', 'unique:users'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:filter', 'max:255', 'unique:users'],
        ]);

        $user = User::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make('semparuk123'),
            'foto' => 'avatar-default.png',
            'role' => 'kepala sekolah',
            'status' => 'Aktif',
        ]);
        event(new Registered($user));
        return redirect()->route('admin.kepala-sekolah.index')->with(['success' => 'Data berhasil disimpan!']);
    }

    public function edit($id): View
    {
        $user = User::findOrFail($id);
        return view('admin.modul.kepala-sekolah.kepala-edit', compact('user'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nip' => ['required', 'string', 'min:18', 'max:18', 'unique:users,nip,' . $id],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:filter', 'max:255', 'unique:users,email,' . $id],
            'status' => ['string', 'max:255'],
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $image->storeAs('public/foto', $image->hashName());

            // Hapus foto lama jika ada
            if ($user->foto && $user->foto != 'avatar-default.png') {
                Storage::delete('public/foto/' . $user->foto);
            }

            // Perbarui data dengan foto baru
            $user->update([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'email' => $request->email,
                'status' => $request->status,
                'foto' => $image->hashName(),
            ]);
        } else {
            // Jika tidak ada foto baru, perbarui data tanpa menghapus foto lama
            $user->update([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'email' => $request->email,
                'status' => $request->status,
            ]);
        }

        return redirect()->route('admin.kepala-sekolah.index')->with(['success' => 'Data berhasil diperbarui!']);
    }

    public function destroy($id): RedirectResponse
    {
        $user = User::findOrFail($id);

        // Hapus foto jika ada
        if ($user->foto && $user->foto != 'avatar-default.png') {
            Storage::delete('public/foto/' . $user->foto);
        }

        $user->delete();

        return redirect()->route('admin.kepala-sekolah.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
