<?php

namespace App\Http\Controllers\Guru_Bk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PresensiSiswa2Controller extends Controller
{
    public function index(): View
    {
        return view('guru-bk.modul.kelola-siswa.presensi');
    }
}
