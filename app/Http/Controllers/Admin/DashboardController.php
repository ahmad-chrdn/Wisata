<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Masalah;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */

    // Sebelum masuk, verifikasi email dahulu
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }

    // Halaman Dashboard
    public function __invoke(Request $request)
    {
        $totalSiswa = Siswa::count();
        $totalKepalaSekolah = User::where('role', 'kepala sekolah')->count();
        $totalWaliKelas = User::where('role', 'wali kelas')->count();
        $totalGuruBK = User::where('role', 'guru bk')->count();
        $totalGuruPiket = User::where('role', 'guru piket')->count();
        $totalJurusan = Jurusan::count();
        $totalKelas = Kelas::count();
        $totalMasalah = Masalah::count();
        return view('admin.dashboard', compact('totalSiswa', 'totalKepalaSekolah', 'totalWaliKelas', 'totalGuruBK', 'totalGuruPiket', 'totalJurusan', 'totalKelas', 'totalMasalah'));
    }
}
