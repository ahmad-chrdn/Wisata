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
            'nis' => ['required', 'string', 'min:10', 'max:10', 'unique:siswas'],
            'nm_siswa' => ['required', 'string'],
            'jk' => ['required', 'string'],
            'kelas_id' => ['required', 'exists:kelass,id'],
            'jurusan_id' => ['required', 'exists:jurusans,id'],
            'semester_id' => ['required', 'exists:semesters,id'],
            'status_siswa' => ['required', 'string'],
        ]);

        Siswa::create($validatedData);

        return redirect()->route('admin.kelola-siswa.siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'nis' => ['required', 'string', 'min:10', 'max:10', 'unique:siswas,nis,' . $id],
            'nm_siswa' => ['required', 'string'],
            'jk' => ['required', 'string'],
            'kelas_id' => ['required', 'exists:kelass,id'],
            'jurusan_id' => ['required', 'exists:jurusans,id'],
            'semester_id' => ['required', 'exists:semesters,id'],
            'status_siswa' => ['required', 'string'],
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($validatedData);

        return redirect()->route('admin.kelola-siswa.siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy($id): RedirectResponse
    {
        Siswa::destroy($id);

        return redirect()->route('admin.kelola-siswa.siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
