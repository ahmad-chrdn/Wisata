<?php

namespace App\Http\Controllers\Guru_BK;

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
        $totalJurusan = Jurusan::count();
        $totalKelas = Kelas::count();
        return view('guru-bk.dashboard', compact('totalSiswa','totalMasalah','totalJurusan','totalKelas'));
    }
}
