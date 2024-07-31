<?php

namespace App\Http\Controllers\Wali_Kelas;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PresensiSiswaController extends Controller
{
    public function index(): View
    {
        $presensis = Presensi::with(['siswa.kelas', 'siswa.jurusan'])->get();
        return view('wali-kelas.modul.kelola-siswa.presensi', compact('presensis'));
    }
}
