<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pangkat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PangkatController extends Controller
{
    public function index(): View
    {
        $pangkats = Pangkat::all();

        // Mendapatkan kode pangkat terakhir
        $lastPangkat = Pangkat::latest()->first();

        // Menghasilkan kode pangkat baru
        $nextNumber = $lastPangkat ? intval(substr($lastPangkat->kd_pangkat, 4)) + 1 : 1;
        $kdPangkat = 'PKT-' . sprintf('%03d', $nextNumber);

        return view('admin.modul.pangkat.pangkat', compact('pangkats', 'kdPangkat'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nm_pangkat' => ['required'],
            'gol_ruang' => ['required'],
        ]);

        // Mendapatkan kode pangkat terakhir
        $lastPangkat = Pangkat::latest()->first();

        // Menghasilkan kode pangkat baru
        $nextNumber = $lastPangkat ? intval(substr($lastPangkat->kd_pangkat, 4)) + 1 : 1;
        $kdPangkat = 'PKT-' . sprintf('%03d', $nextNumber);

        // Menyimpan data pangkat
        Pangkat::create([
            'kd_pangkat' => $kdPangkat,
            'nm_pangkat' => $request->nm_pangkat,
            'gol_ruang' => $request->gol_ruang,
        ]);

        return redirect()->route('admin.pangkat.index')->with(['success' => 'Data berhasil disimpan!']);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nm_pangkat' => ['required'],
            'gol_ruang' => ['required'],
        ]);

        $pangkat = Pangkat::findOrFail($id);
        $pangkat->update([
            'nm_pangkat' => $request->nm_pangkat,
            'gol_ruang' => $request->gol_ruang,
        ]);

        return redirect()->route('admin.pangkat.index')->with(['success' => 'Data berhasil diperbarui!']);
    }

    public function destroy(Request $request): RedirectResponse
    {
        Pangkat::destroy($request->id);
        return redirect()->route('admin.pangkat.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
