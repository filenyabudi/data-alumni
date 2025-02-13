<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Alumni;
use App\Models\Mahasiswa;

class AlumniFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alumni::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'mahasiswa_id' => Mahasiswa::factory(),
            'tahun_lulus' => fake()->word(),
            'ipk' => fake()->randomFloat(0, 0, 9999999999.),
            'keterangan' => fake()->text(),
        ];
    }
}
