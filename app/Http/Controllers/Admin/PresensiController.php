<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PresensiController extends Controller
{
    public function index(): View
    {
        $presensis = Presensi::with(['siswa.kelas', 'siswa.jurusan'])->get();
        return view('admin.modul.kelola-siswa.presensi', compact('presensis'));
    }
}
