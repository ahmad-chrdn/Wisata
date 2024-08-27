<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KategoriWisataController extends Controller
{
    // Menampilkan daftar kategori wisata
    public function index(): View
    {
        $categories = Kategori::all();

        return view('admin.modul.kelola-wisata.kategori', compact('categories'));
    }

    // Menyimpan kategori wisata baru
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nm_kategori' => ['required', 'string', 'max:255'],
            'keterangan' => ['required', 'string'],
        ]);

        Kategori::create($validatedData);

        return redirect()->route('admin.kelola-wisata.kategori.index')
            ->with('success', 'Kategori wisata berhasil ditambahkan.');
    }

    // Memperbarui kategori wisata
    public function update(Request $request, $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'nm_kategori' => ['required', 'string', 'max:255'],
            'keterangan' => ['required', 'string'],
        ]);

        $category = Kategori::findOrFail($id);
        $category->update($validatedData);

        return redirect()->route('admin.kelola-wisata.kategori.index')
            ->with('success', 'Kategori wisata berhasil diperbarui.');
    }

    // Menghapus kategori wisata
    public function destroy($id): RedirectResponse
    {
        Kategori::destroy($id);

        return redirect()->route('admin.kelola-wisata.kategori.index')
            ->with('success', 'Kategori wisata berhasil dihapus.');
    }
}
