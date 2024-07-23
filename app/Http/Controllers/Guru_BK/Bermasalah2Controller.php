<?php

namespace App\Http\Controllers\Guru_BK;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class Bermasalah2Controller extends Controller
{
    public function index(): View
    {
        return view('guru-bk.modul.kelola-siswa.bermasalah');
    }
}
