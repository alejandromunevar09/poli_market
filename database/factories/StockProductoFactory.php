<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StockProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bodega_id' => Bodega::factory(),
            'producto_id' => Producto::factory(),
            'cantidad' => $this->faker->numberBetween(10, 100),
        ];
    }
}
