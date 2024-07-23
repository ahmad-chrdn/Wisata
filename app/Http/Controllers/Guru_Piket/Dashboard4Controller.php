<?php

namespace App\Http\Controllers\Guru_Piket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard4Controller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('guru-piket.dashboard');
    }
}
