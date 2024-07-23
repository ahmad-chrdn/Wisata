<?php

namespace App\Http\Controllers\Guru_Piket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PresensiSiswa4Controller extends Controller
{
    public function index(): View
    {
        return view('guru-piket.modul.kelola-siswa.presensi');
    }
}
