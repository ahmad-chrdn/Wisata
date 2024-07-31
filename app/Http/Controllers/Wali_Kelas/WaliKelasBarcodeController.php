<?php

namespace App\Http\Controllers\Wali_Kelas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WaliKelasBarcodeController extends Controller
{
    public function showForm()
    {
        return view('wali-kelas.modul.kelola-siswa.cetak-barcode');
    }
}
