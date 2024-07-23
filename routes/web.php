<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Pegawai\DashboardController as PegawaiDashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\PangkatController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\KepalaController;
use App\Http\Controllers\Admin\GuruBKController;
use App\Http\Controllers\Admin\WaliKelasController;
use App\Http\Controllers\Admin\GuruPiketController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\DukController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PegawaiUserController;
use App\Http\Controllers\Admin\PresensiController;
use App\Http\Controllers\PegawaiExportController;
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

// Redirect ke dashboard
Route::redirect('/', '/admin/dashboard');

// Rute Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified'], 'as' => 'admin.'], function () {
    // Admin->Dashboard
    Route::get('/dashboard', AdminDashboardController::class)->name('dashboard');
    // Admin->User Management
    Route::get('/management', [PegawaiUserController::class, 'index'])->name('management.index');
    Route::post('/management', [PegawaiUserController::class, 'store'])->name('management.store');
    Route::put('/management/{id}', [PegawaiUserController::class, 'update'])->name('management.update');
    Route::delete('/management/{id}', [PegawaiUserController::class, 'destroy'])->name('management.destroy');
    // Admin->Notification
    Route::get('/notification', [NotificationController::class, 'index'])->name('notification.index');
    // Admin->Profil
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin->Dashboard
    // Route::get('/dashboard', DashboardController::class)->name('dashboard');
    // Admin->Pangkat
    Route::get('/pangkat', [PangkatController::class, 'index'])->name('pangkat.index');
    Route::post('/pangkat', [PangkatController::class, 'store'])->name('pangkat.store');
    Route::put('/pangkat/{id}', [PangkatController::class, 'update'])->name('pangkat.update');
    Route::delete('/pangkat/{id}', [PangkatController::class, 'destroy'])->name('pangkat.destroy');
    // Admin->Jabatan
    Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
    Route::post('/jabatan', [JabatanController::class, 'store'])->name('jabatan.store');
    Route::put('/jabatan/{id}', [JabatanController::class, 'update'])->name('jabatan.update');
    Route::delete('/jabatan/{id}', [JabatanController::class, 'destroy'])->name('jabatan.destroy');
    // Admin->Pegawai
    Route::get('/pegawai/data', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/pegawai/export', [PegawaiExportController::class, 'export'])->name('pegawai.export');
    Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('/pegawai/data/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::put('/pegawai/data/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::get('/pegawai/data/{id}', [PegawaiController::class, 'show'])->name('pegawai.show');
    Route::delete('/pegawai/data/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
    Route::get('/pegawai/duk', [DukController::class, 'index'])->name('duk.index');
    Route::post('/pegawai/duk', [DukController::class, 'store'])->name('duk.store');
    Route::put('/pegawai/duk/{id}', [DukController::class, 'update'])->name('duk.update');
    Route::get('/pegawai/duk/{id}', [DukController::class, 'show'])->name('duk.show');
    Route::delete('/pegawai/duk/{id}', [DukController::class, 'destroy'])->name('duk.destroy');


    // Admin->Kepala Sekolah
    Route::get('/kepala-sekolah/data', [KepalaController::class, 'index'])->name('kepala-sekolah.index');
    // Route::get('/kepala-sekolah/export', [PegawaiExportController::class, 'export'])->name('kepala-sekolah.export');
    Route::get('/kepala-sekolah/create', [KepalaController::class, 'create'])->name('kepala-sekolah.create');
    Route::post('/kepala-sekolah', [KepalaController::class, 'store'])->name('kepala-sekolah.store');
    Route::get('/kepala-sekolah/data/{id}/edit', [KepalaController::class, 'edit'])->name('kepala-sekolah.edit');
    Route::put('/kepala-sekolah/data/{id}', [KepalaController::class, 'update'])->name('kepala-sekolah.update');
    Route::delete('/kepala-sekolah/data/{id}', [KepalaController::class, 'destroy'])->name('kepala-sekolah.destroy');
    // Route::get('/kepala-sekolah/duk', [DukController::class, 'index'])->name('duk.index');
    // Route::post('/kepala-sekolah/duk', [DukController::class, 'store'])->name('duk.store');
    // Route::put('/kepala-sekolah/duk/{id}', [DukController::class, 'update'])->name('duk.update');
    // Route::get('/kepala-sekolah/duk/{id}', [DukController::class, 'show'])->name('duk.show');
    // Route::delete('/kepala-sekolah/duk/{id}', [DukController::class, 'destroy'])->name('duk.destroy');

    // Admin->GuruBK
    Route::get('/guru-bk/data', [GuruBKController::class, 'index'])->name('guru-bk.index');
    // Route::get('/guru-bk/export', [PegawaiExportController::class, 'export'])->name('guru-bk.export');
    Route::get('/guru-bk/create', [GuruBKController::class, 'create'])->name('guru-bk.create');
    Route::post('/guru-bk', [GuruBKController::class, 'store'])->name('guru-bk.store');
    Route::get('/guru-bk/data/{id}/edit', [GuruBKController::class, 'edit'])->name('guru-bk.edit');
    Route::put('/guru-bk/data/{id}', [GuruBKController::class, 'update'])->name('guru-bk.update');
    Route::delete('/guru-bk/data/{id}', [GuruBKController::class, 'destroy'])->name('guru-bk.destroy');

    // Admin->WaliKelas
    Route::get('/wali-kelas/data', [WaliKelasController::class, 'index'])->name('wali-kelas.index');
    // Route::get('/wali-kelas/export', [PegawaiExportController::class, 'export'])->name('wali-kelas.export');
    Route::get('/wali-kelas/create', [WaliKelasController::class, 'create'])->name('wali-kelas.create');
    Route::post('/wali-kelas', [WaliKelasController::class, 'store'])->name('wali-kelas.store');
    Route::get('/wali-kelas/data/{id}/edit', [WaliKelasController::class, 'edit'])->name('wali-kelas.edit');
    Route::put('/wali-kelas/data/{id}', [WaliKelasController::class, 'update'])->name('wali-kelas.update');
    Route::delete('/wali-kelas/data/{id}', [WaliKelasController::class, 'destroy'])->name('wali-kelas.destroy');

    // Admin->GuruPiket
    Route::get('/guru-piket/data', [GuruPiketController::class, 'index'])->name('guru-piket.index');
    // Route::get('/guru-piket/export', [PegawaiExportController::class, 'export'])->name('guru-piket.export');
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

    // Admin->Semseter
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

    // Admin->Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute Pegawai
Route::group(['prefix' => 'kepala sekolah', 'middleware' => ['auth', 'verified'], 'as' => 'kepala sekolah.'], function () {
    Route::get('/dashboard', PegawaiDashboardController::class)->name('dashboard');
});

require __DIR__ . '/auth.php';
