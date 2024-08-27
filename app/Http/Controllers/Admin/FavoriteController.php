<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FavoriteController extends Controller
{
    // Menampilkan daftar favorit
    public function index(): View
    {
        // Mengambil semua data favorit yang terkait dengan pengguna saat ini
        $favorites = Favorite::with(['destination.kategori'])->where('user_id', auth()->id())->get();

        return view('admin.modul.favorit.favorite', compact('favorites'));
    }

    // Menghapus favorit
    public function destroy($id): RedirectResponse
    {
        // Mengambil data favorit berdasarkan ID dan memastikan bahwa data tersebut milik pengguna yang sedang login
        $favorite = Favorite::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        // Menghapus favorit
        $favorite->delete();

        return redirect()->route('admin.favorite.index')
            ->with('success', 'Favorit berhasil dihapus.');
    }
}
