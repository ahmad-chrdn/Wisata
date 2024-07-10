<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JabatanController extends Controller
{
    public function index(): View
    {
        $jabatans = Jabatan::all();

        // Mendapatkan kode jabatan terakhir
        $lastJabatan = Jabatan::latest()->first();

        // Menghasilkan kode jabatan baru
        $nextNumber = $lastJabatan ? intval(substr($lastJabatan->kd_jabatan, 4)) + 1 : 1;
        $kdJabatan = 'JBT-' . sprintf('%03d', $nextNumber);

        return view('admin.modul.jabatan.jabatan', compact('jabatans', 'kdJabatan'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nm_jabatan' => ['required', 'string', 'max:255'],
        ]);

        // Mendapatkan kode jabatan terakhir
        $lastJabatan = Jabatan::latest()->first();

        // Menghasilkan kode jabatan baru
        $nextNumber = $lastJabatan ? intval(substr($lastJabatan->kd_jabatan, 4)) + 1 : 1;
        $kdJabatan = 'JBT-' . sprintf('%03d', $nextNumber);

        // Menyimpan data jabatan
        Jabatan::create([
            'kd_jabatan' => $kdJabatan,
            'nm_jabatan' => $request->nm_jabatan,
        ]);

        return redirect()->route('admin.jabatan.index')->with(['success' => 'Data berhasil disimpan!']);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nm_jabatan' => ['required', 'string', 'max:255'],
        ]);

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update([
            'nm_jabatan' => $request->nm_jabatan,
        ]);

        return redirect()->route('admin.jabatan.index')->with(['success' => 'Data berhasil diperbarui!']);
    }

    public function destroy(Request $request): RedirectResponse
    {
        Jabatan::destroy($request->id);
        return redirect()->route('admin.jabatan.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
