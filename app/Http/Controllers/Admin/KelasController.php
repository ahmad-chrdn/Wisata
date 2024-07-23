<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
// use App\Models\Kelas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KelasController extends Controller
{
    public function index(): View
    {
        $kelass = Kelas::all();

        // Mendapatkan kode kelas terakhir
        $lastKelas = Kelas::latest()->first();

        // Menghasilkan kode kelas baru
        $nextNumber = $lastKelas ? intval(substr($lastKelas->kd_kelas, 4)) + 1 : 1;
        $kdKelas = 'KDK-' . sprintf('%03d', $nextNumber);

        return view('admin.modul.kelola-akademik.kelas', compact('kelass', 'kdKelas'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nm_kelas' => ['required'],
        ]);

        // Mendapatkan kode kelas terakhir
        $lastKelas = Kelas::latest()->first();

        // Menghasilkan kode kelas baru
        $nextNumber = $lastKelas ? intval(substr($lastKelas->kd_kelas, 4)) + 1 : 1;
        $kdKelas = 'KDK-' . sprintf('%03d', $nextNumber);

        // Menyimpan data kelas
        Kelas::create([
            'kd_kelas' => $kdKelas,
            'nm_kelas' => $request->nm_kelas,
        ]);

        return redirect()->route('admin.kelola-akademik.kelas.index')->with(['success' => 'Data berhasil disimpan!']);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nm_kelas' => ['required'],
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update([
            'nm_kelas' => $request->nm_kelas,
        ]);

        return redirect()->route('admin.kelola-akademik.kelas.index')->with(['success' => 'Data berhasil diperbarui!']);
    }

    public function destroy(Request $request, $id): RedirectResponse
    {
        Kelas::destroy($id);
        return redirect()->route('admin.kelola-akademik.kelas.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
