<?php

use App\Http\Controllers\Admin\KategoriWisataController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\FavoriteController;
use App\Http\Controllers\Admin\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('welcome');
});

// Redirect ke halaman login jika belum login
Route::get('/', function () {
    return redirect()->route('login');
})->middleware('guest');

// Rute untuk login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->name('login.store')
    ->middleware('guest');

// Rute untuk logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout')
    ->middleware('auth');

// Rute Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified'], 'as' => 'admin.'], function () {
    // Admin->Dashboard
    Route::get('/dashboard', AdminDashboardController::class)->name('dashboard');

    // Admin->Kelola Wisata
    // Kategori
    Route::get('/kelola-wisata/kategori', [KategoriWisataController::class, 'index'])->name('kelola-wisata.kategori.index');
    Route::post('/kelola-wisata/kategori', [KategoriWisataController::class, 'store'])->name('kelola-wisata.kategori.store');
    Route::put('/kelola-wisata/kategori/{id}', [KategoriWisataController::class, 'update'])->name('kelola-wisata.kategori.update');
    Route::delete('/kelola-wisata/kategori/{id}', [KategoriWisataController::class, 'destroy'])->name('kelola-wisata.kategori.destroy');
    // Wisata
    Route::get('/kelola-wisata/destination', [DestinationController::class, 'index'])->name('kelola-wisata.destination.index');
    Route::post('/kelola-wisata/destination', [DestinationController::class, 'store'])->name('kelola-wisata.destination.store');
    Route::put('/kelola-wisata/destination/{id}', [DestinationController::class, 'update'])->name('kelola-wisata.destination.update');
    Route::delete('/kelola-wisata/destination/{id}', [DestinationController::class, 'destroy'])->name('kelola-wisata.destination.destroy');
    // Favorit
    Route::get('/favorite/data', [FavoriteController::class, 'index'])->name('favorite.index');
    Route::delete('/favorite/data{id}', [FavoriteController::class, 'destroy'])->name('favorite.destroy');
    // Review
    Route::get('/reviews/data', [ReviewController::class, 'index'])->name('reviews.index');
    Route::delete('/reviews/data{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});

require __DIR__ . '/auth.php';
