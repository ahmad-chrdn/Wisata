<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ReviewController extends Controller
{
    // Menampilkan daftar ulasan
    public function index(): View
    {
        // Mengambil semua ulasan yang terkait dengan pengguna saat ini
        $reviews = Review::with(['destination.kategori'])->where('user_id', auth()->id())->get();

        return view('admin.modul.review.reviews', compact('reviews'));
    }

    // Menghapus ulasan
    public function destroy($id): RedirectResponse
    {
        // Mengambil ulasan berdasarkan ID dan memastikan bahwa data tersebut milik pengguna yang sedang login
        $review = Review::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        // Menghapus ulasan
        $review->delete();

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Ulasan berhasil dihapus.');
    }
}
