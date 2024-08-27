<?php

use App\Http\Controllers\Admin\KategoriWisataController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\BermasalahController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\RekapitulasiController;
use App\Http\Controllers\Wali_Kelas\RekapitulasiController as Wali_Kelas_Rekap;
use App\Http\Controllers\Guru_Piket\RekapitulasiController as GuruPiket_Rekap;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\Kepala_Sekolah\DashboardController as KepalaSekolahDashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Kepala_Sekolah\PresensiSiswaController;
use App\Http\Controllers\Kepala_Sekolah\BermasalahController as KepalaSekolah_Bermasalah;
use App\Http\Controllers\Wali_Kelas\BermasalahController as WaliKelas_Bermasalah;
use App\Http\Controllers\Kepala_Sekolah\ProfileController as KepalaSekolahProfileController;
use App\Http\Controllers\Guru_BK\DashboardController as GuruBK_Dashboard;
use App\Http\Controllers\Guru_BK\PresensiSiswaController as Guru_BK_Presensi;
use App\Http\Controllers\Guru_BK\BermasalahController as Guru_BK_Bermasalah;
use App\Http\Controllers\Guru_BK\ProfileController as GuruBK_Profile;
use App\Http\Controllers\Wali_Kelas\DashboardController as Wali_Kelas_Dashboard;
use App\Http\Controllers\Wali_Kelas\PresensiSiswaController as Wali_Kelas_Presensi;
use App\Http\Controllers\Wali_Kelas\ProfileController as Wali_Kelas_Profile;
use App\Http\Controllers\Guru_Piket\DashboardController as GuruPiket_Dashboard;
use App\Http\Controllers\Guru_Piket\PresensiSiswaController as GuruPiket_Presensi;
use App\Http\Controllers\Guru_Piket\ProfileController as Guru_PiketProfile;
use App\Http\Controllers\Admin\KepalaController;
use App\Http\Controllers\Admin\GuruBKController;
use App\Http\Controllers\Admin\WaliKelasController;
use App\Http\Controllers\Admin\GuruPiketController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\PresensiController;
use App\Http\Controllers\Guru_Piket\AbsensiSiswaController;
use App\Http\Controllers\Absensi\AbsensiBarcodeController;
use App\Http\Controllers\Admin\FavoriteController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Wali_Kelas\WaliKelasBarcodeController;
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

// Rute untuk Absensi Siswa via Barcode
Route::get('/absensi/siswa', [AbsensiBarcodeController::class, 'showForm'])->name('absensi.barcode.form');
Route::post('/absensi/siswa', [AbsensiBarcodeController::class, 'store'])->name('absensi.barcode.store');
Route::get('/absensi/riwayat', [AbsensiBarcodeController::class, 'showRiwayatForm'])->name('absensi.riwayat.form');
Route::post('/absensi/riwayat', [AbsensiBarcodeController::class, 'showAbsensi'])->name('absensi.riwayat');

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
    // Route::get('/kelola-wisata/presensi', [PresensiController::class, 'index'])->name('kelola-wisata.presensi.index');
    // Route::get('/kelola-wisata/bermasalah', [BermasalahController::class, 'index'])->name('kelola-wisata.bermasalah.index');
    // Route::get('/kelola-wisata/bermasalah/{id}', [BermasalahController::class, 'show'])->name('kelola-wisata.bermasalah.show');

    // Admin->Kepala Sekolah
    Route::get('/kepala-sekolah/data', [KepalaController::class, 'index'])->name('kepala-sekolah.index');
    Route::get('/kepala-sekolah/create', [KepalaController::class, 'create'])->name('kepala-sekolah.create');
    Route::post('/kepala-sekolah', [KepalaController::class, 'store'])->name('kepala-sekolah.store');
    Route::get('/kepala-sekolah/data/{id}/edit', [KepalaController::class, 'edit'])->name('kepala-sekolah.edit');
    Route::put('/kepala-sekolah/data/{id}', [KepalaController::class, 'update'])->name('kepala-sekolah.update');
    Route::delete('/kepala-sekolah/data/{id}', [KepalaController::class, 'destroy'])->name('kepala-sekolah.destroy');

    // Admin->GuruBK
    Route::get('/guru-bk/data', [GuruBKController::class, 'index'])->name('guru-bk.index');
    Route::get('/guru-bk/create', [GuruBKController::class, 'create'])->name('guru-bk.create');
    Route::post('/guru-bk', [GuruBKController::class, 'store'])->name('guru-bk.store');
    Route::get('/guru-bk/data/{id}/edit', [GuruBKController::class, 'edit'])->name('guru-bk.edit');
    Route::put('/guru-bk/data/{id}', [GuruBKController::class, 'update'])->name('guru-bk.update');
    Route::delete('/guru-bk/data/{id}', [GuruBKController::class, 'destroy'])->name('guru-bk.destroy');

    // Admin->WaliKelas
    Route::get('/wali-kelas/data', [WaliKelasController::class, 'index'])->name('wali-kelas.index');
    Route::get('/wali-kelas/create', [WaliKelasController::class, 'create'])->name('wali-kelas.create');
    Route::post('/wali-kelas', [WaliKelasController::class, 'store'])->name('wali-kelas.store');
    Route::get('/wali-kelas/data/{id}/edit', [WaliKelasController::class, 'edit'])->name('wali-kelas.edit');
    Route::put('/wali-kelas/data/{id}', [WaliKelasController::class, 'update'])->name('wali-kelas.update');
    Route::delete('/wali-kelas/data/{id}', [WaliKelasController::class, 'destroy'])->name('wali-kelas.destroy');

    // Admin->GuruPiket
    Route::get('/guru-piket/data', [GuruPiketController::class, 'index'])->name('guru-piket.index');
    Route::get('/guru-piket/create', [GuruPiketController::class, 'create'])->name('guru-piket.create');
    Route::post('/guru-piket', [GuruPiketController::class, 'store'])->name('guru-piket.store');
    Route::get('/guru-piket/data/{id}/edit', [GuruPiketController::class, 'edit'])->name('guru-piket.edit');
    Route::put('/guru-piket/data/{id}', [GuruPiketController::class, 'update'])->name('guru-piket.update');
    Route::delete('/guru-piket/data/{id}', [GuruPiketController::class, 'destroy'])->name('guru-piket.destroy');

    // Admin->Kelas
    Route::get('/kelola-akademik/kelas', [KelasController::class, 'index'])->name('kelola-akademik.kelas.index');
    Route::post('/kelola-akademik/kelas', [KelasController::class, 'store'])->name('kelola-akademik.kelas.store');
    Route::put('/kelola-akademik/kelas/{id}', [KelasController::class, 'update'])->name('kelola-akademik.kelas.update');
    Route::delete('/kelola-akademik/kelas/{id}', [KelasController::class, 'destroy'])->name('kelola-akademik.kelas.destroy');

    // Admin->Jurusan
    Route::get('/kelola-akademik/jurusan', [JurusanController::class, 'index'])->name('kelola-akademik.jurusan.index');
    Route::post('/kelola-akademik/jurusan', [JurusanController::class, 'store'])->name('kelola-akademik.jurusan.store');
    Route::put('/kelola-akademik/jurusan/{id}', [JurusanController::class, 'update'])->name('kelola-akademik.jurusan.update');
    Route::delete('/kelola-akademik/jurusan/{id}', [JurusanController::class, 'destroy'])->name('kelola-akademik.jurusan.destroy');

    // Admin->Semester
    Route::get('/kelola-akademik/semester', [SemesterController::class, 'index'])->name('kelola-akademik.semester.index');
    Route::post('/kelola-akademik/semester', [SemesterController::class, 'store'])->name('kelola-akademik.semester.store');
    Route::put('/kelola-akademik/semester/{id}', [SemesterController::class, 'update'])->name('kelola-akademik.semester.update');
    Route::delete('/kelola-akademik/semester/{id}', [SemesterController::class, 'destroy'])->name('kelola-akademik.semester.destroy');

    // Admin->Siswa
    Route::get('/kelola-siswa/siswa', [SiswaController::class, 'index'])->name('kelola-siswa.siswa.index');
    Route::post('/kelola-siswa/siswa', [SiswaController::class, 'store'])->name('kelola-siswa.siswa.store');
    Route::put('/kelola-siswa/siswa/{id}', [SiswaController::class, 'update'])->name('kelola-siswa.siswa.update');
    Route::delete('/kelola-siswa/siswa/{id}', [SiswaController::class, 'destroy'])->name('kelola-siswa.siswa.destroy');
    Route::get('/kelola-siswa/presensi', [PresensiController::class, 'index'])->name('kelola-siswa.presensi.index');
    Route::get('/kelola-siswa/bermasalah', [BermasalahController::class, 'index'])->name('kelola-siswa.bermasalah.index');
    Route::get('/kelola-siswa/bermasalah/{id}', [BermasalahController::class, 'show'])->name('kelola-siswa.bermasalah.show');

    // Admin->Rekapitulasi
    Route::get('/rekapitulasi/rekap/{id}', [RekapitulasiController::class, 'show'])->name('rekapitulasi.rekap.show');
    Route::post('/rekapitulasi/rekap/{id}', [RekapitulasiController::class, 'rekapitulasi'])->name('rekapitulasi.rekap');

    // Admin->Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute Kepala Sekolah
Route::group(['prefix' => 'kepala_sekolah', 'middleware' => ['auth', 'verified'], 'as' => 'kepala_sekolah.'], function () {
    // Kepala Sekolah->Dashboard
    Route::get('/dashboard', KepalaSekolahDashboardController::class)->name('dashboard');

    // Kepala Sekolah->Profil
    Route::get('/profile', [KepalaSekolahProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [KepalaSekolahProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [KepalaSekolahProfileController::class, 'destroy'])->name('profile.destroy');

    // Kepala Sekolah->Siswa
    Route::get('/kelola-siswa/presensi', [PresensiSiswaController::class, 'index'])->name('kelola-siswa.presensi.index');

    // Kepala Sekolah->Bermasalah
    Route::get('/kelola-siswa/bermasalah', [KepalaSekolah_Bermasalah::class, 'index'])->name('kelola-siswa.bermasalah.index');
    Route::get('/kelola-siswa/bermasalah/{id}', [KepalaSekolah_Bermasalah::class, 'show'])->name('kelola-siswa.bermasalah.show');
});

// Rute Guru Bk
Route::group(['prefix' => 'guru_bk', 'middleware' => ['auth', 'verified'], 'as' => 'guru_bk.'], function () {
    // Guru Bk->Dashboard
    Route::get('/dashboard', GuruBK_Dashboard::class)->name('dashboard');

    // Guru Bk->Profil
    Route::get('/profile', [GuruBK_Profile::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [GuruBK_Profile::class, 'update'])->name('profile.update');
    Route::delete('/profile', [GuruBK_Profile::class, 'destroy'])->name('profile.destroy');

    // Guru Bk->Siswa
    Route::get('/kelola-siswa/presensi', [Guru_BK_Presensi::class, 'index'])->name('kelola-siswa.presensi.index');

    // Guru Bk->Bermasalah
    Route::get('/kelola-siswa/bermasalah', [Guru_BK_Bermasalah::class, 'index'])->name('kelola-siswa.bermasalah.index');
    Route::post('/kelola-siswa/bermasalah', [Guru_BK_Bermasalah::class, 'store'])->name('kelola-siswa.bermasalah.store');
    Route::put('/kelola-siswa/bermasalah/{id}', [Guru_BK_Bermasalah::class, 'update'])->name('kelola-siswa.bermasalah.update');
    Route::get('/kelola-siswa/bermasalah/{id}', [Guru_BK_Bermasalah::class, 'show'])->name('kelola-siswa.bermasalah.show');
    Route::delete('/kelola-siswa/bermasalah/{id}', [Guru_BK_Bermasalah::class, 'destroy'])->name('kelola-siswa.bermasalah.destroy');
});

// Rute Wali Kelas
Route::group(['prefix' => 'wali_kelas', 'middleware' => ['auth', 'verified'], 'as' => 'wali_kelas.'], function () {
    // Wali Kelas->Dashboard
    Route::get('/dashboard', Wali_Kelas_Dashboard::class)->name('dashboard');

    // Wali Kelas->Profil
    Route::get('/profile', [Wali_Kelas_Profile::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Wali_Kelas_Profile::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Wali_Kelas_Profile::class, 'destroy'])->name('profile.destroy');

    // Wali Kelas->Cetak Barcode
    Route::get('/kelola-siswa/cetak-barcode', [WaliKelasBarcodeController::class, 'showForm'])->name('cetak-barcode');
    Route::get('/barcode/download', [BarcodeController::class, 'download'])->name('barcode.download');

    // Wali Kelas->Presensi Siswa
    Route::get('/kelola-siswa/presensi', [Wali_Kelas_Presensi::class, 'index'])->name('kelola-siswa.presensi.index');

    // Wali Kelas->Bermasalah
    Route::get('/kelola-siswa/bermasalah', [WaliKelas_Bermasalah::class, 'index'])->name('kelola-siswa.bermasalah.index');
    Route::get('/kelola-siswa/bermasalah/{id}', [WaliKelas_Bermasalah::class, 'show'])->name('kelola-siswa.bermasalah.show');

    // Wali Kelas->Rekapitulasi
    Route::get('/rekapitulasi/rekap/{id}', [Wali_Kelas_Rekap::class, 'show'])->name('rekapitulasi.rekap.show');
    Route::post('/rekapitulasi/rekap/{id}', [Wali_Kelas_Rekap::class, 'rekapitulasi'])->name('rekapitulasi.rekap');
});

// Rute Guru Piket
Route::group(['prefix' => 'guru_piket', 'middleware' => ['auth', 'verified'], 'as' => 'guru_piket.'], function () {
    // Guru Piket->Dashboard
    Route::get('/dashboard', GuruPiket_Dashboard::class)->name('dashboard');

    // Guru Piket->Profil
    Route::get('/profile', [Guru_PiketProfile::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Guru_PiketProfile::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Guru_PiketProfile::class, 'destroy'])->name('profile.destroy');

    // Guru Bk->Absensi Siswa
    Route::get('/kelola-siswa/absensi', [AbsensiSiswaController::class, 'index'])->name('kelola-siswa.absensi.index');
    Route::post('/kelola-siswa/absensi', [AbsensiSiswaController::class, 'store'])->name('kelola-siswa.absensi.store');

    // Guru Piket->Presensi Siswa
    Route::get('/kelola-siswa/presensi', [GuruPiket_Presensi::class, 'index'])->name('kelola-siswa.presensi.index');
    Route::get('/kelola-siswa/presensi/{id}/edit', [GuruPiket_Presensi::class, 'edit'])->name('kelola-siswa.presensi.edit');
    Route::put('/kelola-siswa/presensi/{id}', [GuruPiket_Presensi::class, 'update'])->name('kelola-siswa.presensi.update');

    // Guru Piket->Rekapitulasi
    Route::get('/rekapitulasi/rekap/{id}', [GuruPiket_Rekap::class, 'show'])->name('rekapitulasi.rekap.show');
    Route::post('/rekapitulasi/rekap/{id}', [GuruPiket_Rekap::class, 'rekapitulasi'])->name('rekapitulasi.rekap');
});

require __DIR__ . '/auth.php';
