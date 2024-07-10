<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\Pangkat;
use App\Models\Pegawai;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PegawaiController extends Controller
{
    public function index(): View
    {
        $pegawais = Pegawai::with(['pangkat', 'jabatan'])->get();
        return view('admin.modul.pegawai.pegawai-data', compact('pegawais'));
    }

    public function create(): View
    {
        $pangkatList = Pangkat::all();
        $jabatanList = Jabatan::all();

        return view('admin.modul.pegawai.pegawai-create', compact('pangkatList', 'jabatanList'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validateData = $request->validate([
            'nip' => ['required', 'unique:' . Pegawai::class],
            'nm_pegawai' => ['required'],
            'jk' => ['required', 'in:L,P'],
            'tempat_lahir' => ['required'],
            'tgl_lahir' => ['required', 'date'],
            'agama' => [''],
            'pendidikan' => ['required'],
            'keterangan' => [''],
            'pangkat_id' => ['required', 'exists:pangkats,id'],
            'pangkat_tmt' => ['required', 'date'],
            'jabatan_id' => ['required', 'exists:jabatans,id'],
            'jabatan_tmt' => ['nullable', 'date'],
        ]);

        Pegawai::create($validateData);
        return redirect()->route('admin.pegawai.index')->with(['success' => 'Data berhasil disimpan!']);
    }

    public function edit(string $id): View
    {
        $pegawais = Pegawai::findOrFail($id);
        $pangkatList = Pangkat::all();
        $jabatanList = Jabatan::all();

        return view('admin.modul.pegawai.pegawai-edit', compact('pegawais', 'pangkatList', 'jabatanList'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $validateData = $request->validate([
            'nip' => ['required', 'unique:pegawais,nip,' . $id],
            'nm_pegawai' => ['required'],
            'jk' => ['required', 'in:L,P'],
            'tempat_lahir' => ['required'],
            'tgl_lahir' => ['required', 'date'],
            'agama' => [''],
            'pendidikan' => ['required'],
            'keterangan' => [''],
            'pangkat_id' => ['required', 'exists:pangkats,id'],
            'pangkat_tmt' => ['required', 'date'],
            'jabatan_id' => ['required', 'exists:jabatans,id'],
            'jabatan_tmt' => ['nullable', 'date'],
        ]);

        $pegawais = Pegawai::findOrFail($id);
        $pegawais->update($validateData);
        return redirect()->route('admin.pegawai.index')->with(['success' => 'Data berhasil diperbarui!']);
    }

    public function show(string $id): View
    {
        $pegawais = Pegawai::findOrFail($id);
        return view('admin.modul.pegawai.pegawai-detail', compact('pegawais'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Pegawai::destroy($request->id);
        return redirect()->route('admin.pegawai.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
