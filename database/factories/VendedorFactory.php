<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VendedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'autorizado' => $this->faker->boolean(80), // 80% probabilidad autorizado
        ];
    }
}
