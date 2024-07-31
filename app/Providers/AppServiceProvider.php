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
        // Menggunakan view composer untuk menyuntikkan data kelas ke sidebar
        view()->composer('components.sidebar-admin', function ($view) {
            $kelas = Kelas::all();
            $kelasKosong = $kelas->isEmpty();
            $view->with(compact('kelas', 'kelasKosong'));
        });
    }
}
