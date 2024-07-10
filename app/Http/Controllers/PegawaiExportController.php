<?php

namespace App\Http\Controllers;

use App\Exports\PegawaisExport;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiExportController extends Controller
{
    public function export()
    {
        return Excel::download(new PegawaisExport, 'Data Pegawai.xlsx');
    }
}
