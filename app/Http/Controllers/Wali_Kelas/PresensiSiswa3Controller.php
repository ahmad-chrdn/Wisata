<?php

namespace App\Http\Controllers\Wali_Kelas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PresensiSiswa3Controller extends Controller
{
    public function index(): View
    {
        return view('wali-kelas.modul.kelola-siswa.presensi');
    }
}
