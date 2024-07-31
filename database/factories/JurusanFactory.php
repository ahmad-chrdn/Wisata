<?php

namespace Database\Factories;

use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Factories\Factory;

class JurusanFactory extends Factory
{
    protected $model = Jurusan::class;

    public function definition()
    {
        return [
            'kd_jurusan' => $this->faker->unique()->numerify('JRS-###'),
            'nm_jurusan' => $this->faker->word,
        ];
    }
}
