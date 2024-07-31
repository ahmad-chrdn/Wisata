<?php

namespace Database\Factories;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Semester;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    protected $model = Siswa::class;

    public function definition()
    {
        return [
            'nis' => $this->faker->unique()->numerify('########'),
            'nm_siswa' => $this->faker->name,
            'jk' => $this->faker->randomElement(['L', 'P']),
            'kelas_id' => Kelas::factory(),
            'jurusan_id' => Jurusan::factory(),
            'semester_id' => Semester::factory(),
            'status_siswa' => 1,
        ];
    }
}
