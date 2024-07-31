<?php

namespace App\Http\Controllers\Guru_Piket;

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
        return view('guru-piket.modul.kelola-siswa.presensi', compact('presensis'));
    }

    public function edit($id): View
    {
        $presensi = Presensi::findOrFail($id);
        return view('guru-piket.modul.kelola-siswa.absensi-edit', compact('presensi'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'status_presensi' => ['required', 'in:Hadir,Izin,Sakit,Alpa,Terlambat'],
        ]);

        $presensi = Presensi::findOrFail($id);
        $presensi->status_presensi = $request->status_presensi;
        $presensi->save();

        return redirect()->route('guru_piket.kelola-siswa.presensi.index')->with('success', 'Absensi berhasil diperbarui!');
    }
}
