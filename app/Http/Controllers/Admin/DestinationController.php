<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DestinationController extends Controller
{
    // Menampilkan daftar destinasi wisata
    public function index(): View
    {
        $destinations = Destination::with('kategori')->get();
        $categories = Kategori::all();

        return view('admin.modul.kelola-wisata.destination', compact('destinations', 'categories'));
    }

    // Menyimpan destinasi wisata baru
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'kategori_id' => ['required', 'exists:categories,id'],
            'nm_wisata' => ['required', 'string', 'max:255'],
            'keterangan' => ['required', 'string'],
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'latitude' => ['required', 'numeric', 'between:-90,90'],
            'longitude' => ['required', 'numeric', 'between:-180,180'],
        ]);

        if ($request->hasFile('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('foto', 'public');
        }

        Destination::create($validatedData);

        return redirect()->route('admin.kelola-wisata.destination.index')
            ->with('success', 'Destinasi wisata berhasil ditambahkan.');
    }

    // Memperbarui destinasi wisata
    public function update(Request $request, $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'kategori_id' => ['required', 'exists:categories,id'],
            'nm_wisata' => ['required', 'string', 'max:255'],
            'keterangan' => ['required', 'string'],
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'latitude' => ['required', 'numeric', 'between:-90,90'],
            'longitude' => ['required', 'numeric', 'between:-180,180'],
        ]);

        $destination = Destination::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($destination->gambar) {
                Storage::disk('public')->delete('foto/' . $destination->gambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('foto', 'public');
        }

        $destination->update($validatedData);

        return redirect()->route('admin.kelola-wisata.destination.index')
            ->with('success', 'Destinasi wisata berhasil diperbarui.');
    }

    // Menghapus destinasi wisata
    public function destroy($id): RedirectResponse
    {
        Destination::destroy($id);

        return redirect()->route('admin.kelola-wisata.destination.index')
            ->with('success', 'Destinasi wisata berhasil dihapus.');
    }
}
