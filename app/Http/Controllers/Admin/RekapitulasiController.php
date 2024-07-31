<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\Semester;
use Illuminate\Http\Request;

class RekapitulasiController extends Controller
{
    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);
        $jurusans = Jurusan::all();
        $semesters = Semester::where('status', 1)->get(); // Hanya mengambil semester yang aktif (status = 1)
        return view('admin.modul.rekapitulasi.rekap', compact('kelas', 'jurusans', 'semesters'));
    }

    public function rekapitulasi(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);
        $jurusan_id = $request->jurusan_id;
        $semester_id = $request->semester_id;

        $siswas = Siswa::where('kelas_id', $id)
            ->where('jurusan_id', $jurusan_id)
            ->where('semester_id', $semester_id)
            ->with('presensis')
            ->get();

        $rekapitulasi = $siswas->map(function ($siswa) {
            $alpa = $siswa->presensis->where('status_presensi', 'Alpa')->count();
            $izin = $siswa->presensis->where('status_presensi', 'Izin')->count();
            $sakit = $siswa->presensis->where('status_presensi', 'Sakit')->count();
            $total = $alpa + $izin + $sakit;

            return [
                'nama' => $siswa->nm_siswa,
                'nis' => $siswa->nis,
                'alpa' => $alpa,
                'izin' => $izin,
                'sakit' => $sakit,
                'total' => $total,
            ];
        });

        $jurusans = Jurusan::all();
        $semesters = Semester::where('status', 1)->get(); // Hanya mengambil semester yang aktif (status = 1)

        return view('admin.modul.rekapitulasi.rekap', compact('rekapitulasi', 'kelas', 'jurusans', 'semesters', 'jurusan_id', 'semester_id'));
    }
}
