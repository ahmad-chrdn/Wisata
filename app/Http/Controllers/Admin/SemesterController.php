<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SemesterController extends Controller
{
    public function index(): View
    {
        $semesters = Semester::all();
        return view('admin.modul.kelola-akademik.semester', compact('semesters'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'semester' => ['required', 'in:Ganjil,Genap'],
            'thn_ajaran' => ['required', 'string'],
            'status' => ['required', 'integer'],
        ]);

        Semester::create($request->all());

        return redirect()->route('admin.kelola-akademik.semester.index')->with(['success' => 'Data berhasil disimpan!']);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'semester' => ['required', 'in:Ganjil,Genap'],
            'thn_ajaran' => ['required', 'string'],
            'status' => ['required', 'integer'],
        ]);

        $semester = Semester::findOrFail($id);
        $semester->update($request->all());
        return redirect()->route('admin.kelola-akademik.semester.index')->with(['success' => 'Data berhasil diperbarui!']);
    }

    public function destroy(Request $request, $id): RedirectResponse
    {
        Semester::destroy($id);
        return redirect()->route('admin.kelola-akademik.semester.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
