<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PenulisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
