<?php

namespace Database\Factories;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

class KelasFactory extends Factory
{
    protected $model = Kelas::class;

    public function definition()
    {
        return [
            'kd_kelas' => $this->faker->unique()->numerify('KDK-###'),
            'nm_kelas' => $this->faker->word,
        ];
    }
}
