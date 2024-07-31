<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'nip' => $this->faker->unique()->numerify('########'),
            'nama' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('semparuk123'), // Password default
            'remember_token' => Str::random(10),
            'foto' => null,
            'role' => $this->faker->randomElement(['admin', 'guru piket', 'guru bk', 'kepala sekolah', 'wali kelas']),
            'status' => 'Aktif',
        ];
    }
}
