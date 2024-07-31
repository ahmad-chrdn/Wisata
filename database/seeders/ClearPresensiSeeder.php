<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Database\Seeder;
use App\Models\Presensi;
use App\Models\Semester;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;

class ClearPresensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menghapus data presensi yang ditambahkan dalam 30 hari terakhir
        Presensi::where('created_at', '>=', Carbon::now()->subDays(30))->delete();

        // Menghapus data siswa yang ditambahkan dalam 30 hari terakhir
        Siswa::where('created_at', '>=', Carbon::now()->subDays(30))->delete();

        // Menghapus data kelas yang ditambahkan dalam 30 hari terakhir
        Kelas::where('created_at', '>=', Carbon::now()->subDays(30))->delete();

        // Menghapus data jurusan yang ditambahkan dalam 30 hari terakhir
        Jurusan::where('created_at', '>=', Carbon::now()->subDays(30))->delete();

        // Menghapus data semester yang ditambahkan dalam 30 hari terakhir
        Semester::where('created_at', '>=', Carbon::now()->subDays(30))->delete();

        // Menghapus data dummy dari tabel users yang ditambahkan dalam 30 hari terakhir
        User::where('created_at', '>=', Carbon::now()->subDays(30))->delete();
    }
}
