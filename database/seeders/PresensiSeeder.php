<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Presensi;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;

class PresensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat beberapa user dummy
        $users = User::factory()->count(5)->create();

        // Buat beberapa siswa dummy
        $siswas = Siswa::factory()->count(10)->create();

        // Buat presensi dummy untuk masing-masing siswa
        foreach ($siswas as $siswa) {
            foreach (range(1, 10) as $index) {
                Presensi::create([
                    'hari' => Carbon::now()->subDays(rand(0, 7))->isoFormat('dddd'),
                    'siswa_id' => $siswa->id,
                    'status_presensi' => collect(['Hadir', 'Terlambat', 'Izin', 'Sakit', 'Alpa'])->random(),
                    'waktu_presensi' => Carbon::now()->subDays(rand(0, 30))->subMinutes(rand(0, 60)),
                    'user_id' => $users->random()->id,
                ]);
            }
        }
    }
}
