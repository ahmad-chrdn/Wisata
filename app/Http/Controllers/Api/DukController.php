<?php

namespace App\Http\Controllers\Api;

use App\Models\Duk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DukController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'pegawai_id' => ['required', 'exists:pegawais,id', 'unique:' . Duk::class],
            'pangkat_id' => ['required', 'exists:pangkats,id'],
            'pangkatYad_tmt' => ['required'],
        ]);

        Duk::create($validateData);
        return response()->json(['message' => 'Data berhasil disimpan!']);
    }
}
