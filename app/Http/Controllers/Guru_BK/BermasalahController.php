<?php

namespace App\Http\Controllers\Guru_BK;

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
        return view('guru-bk.modul.kelola-siswa.bermasalah', compact('siswas'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'hari' => ['required', 'string'],
            'siswa_id' => ['required', 'exists:siswas,id'],
            'keterangan' => ['required', 'string'],
            'tanggal' => ['required', 'date'],
        ]);

        Masalah::create($request->all());

        return redirect()->route('guru_bk.kelola-siswa.bermasalah.index')->with(['success' => 'Data berhasil disimpan!']);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'hari' => ['required', 'string'],
            'siswa_id' => ['required', 'exists:siswas,id'],
            'keterangan' => ['required', 'string'],
            'tanggal' => ['required', 'date'],
        ]);

        $masalah = Masalah::findOrFail($id);
        $masalah->update($request->all());

        return redirect()->route('guru_bk.kelola-siswa.bermasalah.index')->with(['success' => 'Data berhasil diperbarui!']);
    }

    public function show(string $id): View
    {
        $masalah = Masalah::findOrFail($id);
        return view('guru-bk.modul.kelola-siswa.bermasalah-detail', compact('masalah'));
    }

    public function destroy($id): RedirectResponse
    {
        Masalah::destroy($id);
        return redirect()->route('guru_bk.kelola-siswa.bermasalah.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
