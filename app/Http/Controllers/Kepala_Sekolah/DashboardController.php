<?php

namespace App\Http\Controllers\Kepala_Sekolah;

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
    public function __invoke(Request $request)
    {
        $totalSiswa = Siswa::count();
        $totalMasalah = Masalah::count();
        $totalWaliKelas = User::where('role','wali kelas')->count();
        $totalGuruBK = User::where('role','guru bk')->count();
        $totalGuruPiket = User::where('role','guru piket')->count();
        $totalJurusan = Jurusan::count();
        $totalKelas = Kelas::count();
        return view('kepala-sekolah.dashboard', compact('totalSiswa','totalMasalah','totalWaliKelas','totalGuruBK','totalGuruPiket','totalJurusan','totalKelas'));
    }
}
