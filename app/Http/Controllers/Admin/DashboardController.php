<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Duk;
use App\Models\Jabatan;
use App\Models\Pangkat;
use App\Models\Pegawai;
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
        // $totalPangkat = Pangkat::count();
        // $totalJabatan = Jabatan::count();
        // $totalPegawai = Pegawai::count();
        // $totalDuk = Duk::count();
        // $genderData = [
        //     'laki_laki' => Pegawai::where('jk', 'L')->count(),
        //     'perempuan' => Pegawai::where('jk', 'P')->count(),
        // ];
        // return view('dashboard', compact('totalPangkat', 'totalJabatan', 'totalPegawai', 'totalDuk', 'genderData'));
        return view('admin.dashboard');
    }
}
