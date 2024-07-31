<?php

namespace App\Http\Controllers\Absensi;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;

class AbsensiBarcodeController extends Controller
{
    public function showForm(Request $request)
    {
        $currentTime = Carbon::now();
        $dayOfWeek = $currentTime->dayOfWeek; // 0 = Minggu, 1 = Senin, ..., 6 = Sabtu
        $morningStartTime = Carbon::createFromTime(7, 0);
        $morningEndTime = Carbon::createFromTime(12, 20);
        $afternoonStartTime = Carbon::createFromTime(12, 30);
        $afternoonEndTime = Carbon::createFromTime(17, 0);

        // Cek apakah hari ini adalah Minggu
        if ($dayOfWeek === 0) {
            return view('absensi-siswa.barcode-expired')->withErrors(['message' => 'Form absensi hanya bisa diakses pada hari Senin sampai Sabtu.']);
        }

        if ($currentTime->between($morningStartTime, $morningEndTime) || $currentTime->between($afternoonStartTime, $afternoonEndTime)) {
            return view('absensi-siswa.barcode');
        } else {
            return view('absensi-siswa.barcode-expired')->withErrors(['message' => 'Form absensi hanya bisa diakses pada sesi yang ditentukan.']);
        }
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nis' => ['required', 'exists:siswas,nis'],
        ], [
            'nis.required' => 'NIS harus diisi.',
            'nis.exists' => 'NIS anda tidak ditemukan dalam data siswa.',
        ]);

        // Mendapatkan data siswa berdasarkan NIS
        $siswa = Siswa::where('nis', $request->nis)->firstOrFail();

        $currentTime = Carbon::now();
        $morningStartTime = Carbon::createFromTime(7, 0);
        $morningLateTime = $morningStartTime->copy()->addMinutes(15);
        $morningEndTime = Carbon::createFromTime(12, 20);

        $afternoonStartTime = Carbon::createFromTime(12, 30);
        $afternoonLateTime = $afternoonStartTime->copy()->addMinutes(15);
        $afternoonEndTime = Carbon::createFromTime(17, 0);

        // Tentukan sesi saat ini (pagi atau sore)
        if ($currentTime->between($morningStartTime, $morningEndTime)) {
            $sesiStartTime = $morningStartTime;
            $sesiEndTime = $morningEndTime;
        } else {
            $sesiStartTime = $afternoonStartTime;
            $sesiEndTime = $afternoonEndTime;
        }

        // Tentukan status kehadiran berdasarkan waktu absensi
        if ($currentTime->between($sesiStartTime, $morningLateTime) || $currentTime->between($afternoonStartTime, $afternoonLateTime)) {
            $statusPresensi = 'Hadir';
        } else {
            $statusPresensi = 'Terlambat';
        }

        // Periksa apakah siswa sudah absen pada sesi ini
        $alreadyAbsen = Presensi::where('siswa_id', $siswa->id)
            ->whereDate('waktu_presensi', $currentTime->toDateString())
            ->whereBetween('waktu_presensi', [$sesiStartTime, $sesiEndTime])
            ->exists();

        if ($alreadyAbsen) {
            return redirect()->route('absensi.barcode.form')->with('error', 'Anda sudah melakukan absensi pada sesi ini.');
        }

        // Mengatur user_id jika pengguna tidak login
        $userId = auth()->check() ? auth()->user()->id : null;

        Presensi::create([
            'hari' => $currentTime->isoFormat('dddd'),
            'siswa_id' => $siswa->id,
            'status_presensi' => $statusPresensi,
            'waktu_presensi' => $currentTime,
            'user_id' => $userId,
        ]);

        return redirect()->route('absensi.barcode.form')->with('success', 'Anda telah melakukan absensi!');
    }

    public function showRiwayatForm()
    {
        return view('absensi-siswa.riwayat');
    }

    public function showAbsensi(Request $request)
    {
        $request->validate([
            'nis' => ['required', 'exists:siswas,nis'],
        ], [
            'nis.required' => 'NIS harus diisi.',
            'nis.exists' => 'NIS anda tidak ditemukan dalam data siswa.',
        ]);

        $siswa = Siswa::where('nis', $request->nis)->firstOrFail();
        $absensi = Presensi::where('siswa_id', $siswa->id)
            ->whereDate('waktu_presensi', Carbon::today())
            ->get();

        return view('absensi-siswa.riwayat', compact('absensi', 'siswa'));
    }
}
