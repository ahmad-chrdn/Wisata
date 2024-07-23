<?php

namespace App\Http\Controllers\Kepala_Sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PresensiSiswaController extends Controller
{
    public function index(): View
    {
        return view('kepala-sekolah.modul.kelola-siswa.presensi');
    }
}
