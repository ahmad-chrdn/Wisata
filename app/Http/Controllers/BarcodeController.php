<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BarcodeController extends Controller
{
    public function download()
    {
        $qrCode = base64_encode(QrCode::format('png')->size(250)->generate('http://192.168.5.45:9090/absensi/siswa'));

        $pdf = PDF::loadView('barcode', compact('qrCode'));
        return $pdf->download('barcode-presensi.pdf');
    }
}
