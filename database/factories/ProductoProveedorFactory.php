<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoProveedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'producto_id' => Producto::factory(),
            'proveedor_id' => Proveedor::factory(),
            'precio_unitario' => $this->faker->randomFloat(2, 500, 3000),
            'cantidad_minima' => $this->faker->numberBetween(10, 50),
        ];
    }
}
