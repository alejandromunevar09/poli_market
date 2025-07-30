<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cliente_id' => Cliente::factory(),
            'vendedor_id' => Vendedor::factory(),
            'fecha' => $this->faker->date(),
            'total' => 0, 
        ];
    }
}
