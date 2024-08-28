<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */

    // Sebelum masuk, verifikasi email dahulu
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }

    // Halaman Dashboard
    public function __invoke(Request $request)
    {
        return view('admin.dashboard');
    }
}
