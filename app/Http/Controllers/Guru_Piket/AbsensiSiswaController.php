<?php

namespace App\Http\Controllers\Guru_Piket;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Carbon\Carbon;

class AbsensiSiswaController extends Controller
{
    public function index(): View
    {
        return view('guru-piket.modul.kelola-siswa.absensi');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nis' => ['required', 'exists:siswas,nis'],
            'status_presensi' => ['required', 'in:Hadir,Izin,Sakit,Alpa,Terlambat'],
        ], [
            'nis.required' => 'NIS harus diisi.',
            'nis.exists' => 'NIS tidak ditemukan dalam data siswa.',
        ]);
        // Mendapatkan data siswa berdasarkan NIS
        $siswa = Siswa::where('nis', $request->nis)->firstOrFail();

        // Menyimpan data presensi
        Presensi::create([
            'hari' => Carbon::now()->isoFormat('dddd'),
            'siswa_id' => $siswa->id,
            'status_presensi' => $request->status_presensi,
            'waktu_presensi' => Carbon::now(),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('guru_piket.kelola-siswa.presensi.index')->with(['success' => 'Absensi berhasil disimpan!']);
    }
}
