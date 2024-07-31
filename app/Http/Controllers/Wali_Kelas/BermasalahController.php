<?php

namespace App\Http\Controllers\Wali_Kelas;

use App\Http\Controllers\Controller;
use App\Models\Masalah;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BermasalahController extends Controller
{
    public function index(): View
    {
        $siswas = Siswa::with(['kelas', 'jurusan', 'semester'])->get();
        return view('wali-kelas.modul.kelola-siswa.bermasalah', compact('siswas'));
    }

    public function show(string $id): View
    {
        $masalah = Masalah::findOrFail($id);
        return view('wali-kelas.modul.kelola-siswa.bermasalah-detail', compact('masalah'));
    }
}
