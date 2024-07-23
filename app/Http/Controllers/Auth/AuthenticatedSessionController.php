<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Logika pengalihan berdasarkan peran (role)
        $user = Auth::user();

        // Tentukan URL dashboard berdasarkan peran pengguna
        $dashboardUrl = '';

        switch ($user->role) {
            case 'admin':
                $dashboardUrl = route('admin.dashboard');
                break;
            case 'kepala sekolah':
                $dashboardUrl = route('kepala_sekolah.dashboard');
                break;
            case 'guru bk':
                $dashboardUrl = route('guru_bk.dashboard');
                break;
            case 'wali kelas':
                $dashboardUrl = route('wali_kelas.dashboard');
                break;
            case 'guru piket':
                $dashboardUrl = route('guru_piket.dashboard');
                break;
        }

        // Redirect ke dashboard yang sesuai
        return redirect($dashboardUrl);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
