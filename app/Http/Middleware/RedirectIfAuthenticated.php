<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'kepala sekolah':
                    return redirect()->route('kepala_sekolah.dashboard');
                case 'guru bk':
                    return redirect()->route('guru_bk.dashboard');
                case 'wali kelas':
                    return redirect()->route('wali_kelas.dashboard');
                case 'guru piket':
                    return redirect()->route('guru_piket.dashboard');
            }
        }

        return $next($request);
    }
}
