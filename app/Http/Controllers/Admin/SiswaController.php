<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Semester;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SiswaController extends Controller
{
    public function index(): View
    {
        $siswas = Siswa::with(['kelas', 'jurusan', 'semester'])->get();
        $kelass = Kelas::all();
        $jurusans = Jurusan::all();
        $semesters = Semester::where('status', 1)->get();
        
        return view('admin.modul.kelola-siswa.siswa', compact('siswas', 'kelass', 'jurusans', 'semesters'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nis' => ['required', 'unique:siswas'],
            'nm_siswa' => ['required'],
            'jk' => ['required'],
            'kelas_id' => ['required', 'exists:kelass,id'],
            'jurusan_id' => ['required', 'exists:jurusans,id'],
            'semester_id' => ['required', 'exists:semesters,id'],
            'status_siswa' => ['required'],
        ]);

        Siswa::create($validatedData);

        return redirect()->route('admin.kelola-siswa.siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function update(Request $request, Siswa $siswa): RedirectResponse
    {
        $validatedData = $request->validate([
            'nis' => ['required', 'unique:siswas,nis,' . $siswa->id],
            'nm_siswa' => ['required'],
            'jk' => ['required'],
            'kelas_id' => ['required', 'exists:kelass,id'],
            'jurusan_id' => ['required', 'exists:jurusans,id'],
            'semester_id' => ['required', 'exists:semesters,id'],
            'status_siswa' => ['required'],
        ]);

        $siswa->update($validatedData);

        return redirect()->route('admin.kelola-siswa.siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Siswa $siswa): RedirectResponse
    {
        $siswa->delete();

        return redirect()->route('admin.kelola-siswa.siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
