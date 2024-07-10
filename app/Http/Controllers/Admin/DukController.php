<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Duk;
use App\Models\Pangkat;
use App\Models\Pegawai;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DukController extends Controller
{
    public function index(): View
    {
        $duks = Duk::with(['pegawai', 'pangkat'])->get();
        $pegawaiList = Pegawai::all();
        $pangkatList = Pangkat::all();
        return view('admin.modul.duk.duk', compact('duks', 'pegawaiList', 'pangkatList'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validateData = $request->validate([
            'pegawai_id' => ['required', 'exists:pegawais,id', 'unique:' . Duk::class],
            'pangkat_id' => ['required', 'exists:pangkats,id'],
            'pangkatYad_tmt' => ['required'],
        ]);

        Duk::create($validateData);
        return redirect()->route('admin.duk.index')->with(['success' => 'Data berhasil disimpan!']);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $validateData = $request->validate([
            'pegawai_id' => ['required', 'exists:pegawais,id', 'unique:duks,pegawai_id,' . $id],
            'pangkat_id' => ['required', 'exists:pangkats,id'],
            'pangkatYad_tmt' => ['required'],
        ]);

        $duks = Duk::findOrFail($id);
        $duks->update($validateData);
        return redirect()->route('admin.duk.index')->with(['success' => 'Data berhasil diperbarui!']);
    }

    public function show(string $id): View
    {
        $duks = Duk::findOrFail($id);
        return view('admin.modul.duk.duk-detail', compact('duks'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Duk::destroy($request->id);
        return redirect()->route('admin.duk.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
