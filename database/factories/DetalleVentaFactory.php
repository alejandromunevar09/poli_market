<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DetalleVentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'venta_id' => Venta::factory(),
            'producto_id' => Producto::factory(),
            'cantidad' => $this->faker->numberBetween(1, 10),
            'subtotal' => 0, 
        ];
    }
}
