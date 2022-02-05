<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'isbn' => $this->faker->countryCode,
            'judul' => $this->faker->sentence(mt_rand(10, 100)),
            'deskripsi' => $this->faker->paragraph,
            'tahun' => $this->faker->year(),
            'stok' => random_int(2, 10)
        ];
    }
}
