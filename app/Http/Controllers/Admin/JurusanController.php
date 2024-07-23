<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JurusanController extends Controller
{
    public function index(): View
    {
        $jurusans = Jurusan::all();

        // Mendapatkan kode kelas terakhir
        $lastJurusan = Jurusan::latest()->first();

        // Menghasilkan kode kelas baru
        $nextNumber = $lastJurusan ? intval(substr($lastJurusan->kd_jurusan, 4)) + 1 : 1;
        $kdJurusan = 'JRS-' . sprintf('%03d', $nextNumber);

        return view('admin.modul.kelola-akademik.jurusan', compact('jurusans', 'kdJurusan'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nm_jurusan' => ['required'],
        ]);

        // Mendapatkan kode kelas terakhir
        $lastJurusan = Jurusan::latest()->first();

        // Menghasilkan kode kelas baru
        $nextNumber = $lastJurusan ? intval(substr($lastJurusan->kd_jurusan, 4)) + 1 : 1;
        $kdJurusan = 'JRS-' . sprintf('%03d', $nextNumber);

        // Menyimpan data kelas
        Jurusan::create([
            'kd_jurusan' => $kdJurusan,
            'nm_jurusan' => $request->nm_jurusan,
        ]);

        return redirect()->route('admin.kelola-akademik.jurusan.index')->with(['success' => 'Data berhasil disimpan!']);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nm_jurusan' => ['required'],
        ]);

        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update([
            'nm_jurusan' => $request->nm_jurusan,
        ]);

        return redirect()->route('admin.kelola-akademik.jurusan.index')->with(['success' => 'Data berhasil diperbarui!']);
    }

    public function destroy(Request $request, $id): RedirectResponse
    {
        Jurusan::destroy($id);
        return redirect()->route('admin.kelola-akademik.jurusan.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
