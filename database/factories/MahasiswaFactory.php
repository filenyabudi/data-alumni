<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Mahasiswa;

class MahasiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mahasiswa::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nim' => fake()->numberBetween(-10000, 10000),
            'nama' => fake()->text(),
            'nik' => fake()->text(),
            'jk' => fake()->word(),
            'nama_ibu' => fake()->text(),
            'agama' => fake()->word(),
            'tempat_lahir' => fake()->word(),
            'tanggal_lahir' => fake()->date(),
            'alamat' => fake()->text(),
            'hp' => fake()->text(),
            'email_kampus' => fake()->text(),
            'email_pribadi' => fake()->text(),
            'tahun_masuk' => fake()->word(),
        ];
    }
}
