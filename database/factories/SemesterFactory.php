<?php

namespace Database\Factories;

use App\Models\Semester;
use Illuminate\Database\Eloquent\Factories\Factory;

class SemesterFactory extends Factory
{
    protected $model = Semester::class;

    public function definition()
    {
        return [
            'semester' => $this->faker->randomElement(['Ganjil', 'Genap']),
            'thn_ajaran' => $this->faker->year . '/' . ($this->faker->year + 1),
            'status' => $this->faker->randomElement([0, 1]),
        ];
    }
}
