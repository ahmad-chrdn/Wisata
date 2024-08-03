<?php

namespace App\Providers;

use App\Models\Kelas;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // View composer untuk sidebar-admin
        view()->composer('components.sidebar-admin', function ($view) {
            $kelas = Kelas::all();
            $kelasKosong = $kelas->isEmpty();
            $view->with(compact('kelas', 'kelasKosong'));
        });

        // View composer untuk sidebar-wali_kelas
        view()->composer('components.sidebar-wali_kelas', function ($view) {
            $kelas = Kelas::all();
            $kelasKosong = $kelas->isEmpty();
            $view->with(compact('kelas', 'kelasKosong'));
        });

        // View composer untuk sidebar-guru_piket
        view()->composer('components.sidebar-guru_piket', function ($view) {
            $kelas = Kelas::all();
            $kelasKosong = $kelas->isEmpty();
            $view->with(compact('kelas', 'kelasKosong'));
        });
    }
}
