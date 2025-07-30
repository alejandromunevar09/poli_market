<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EntregaFactory extends Factory
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
            'cliente_id' => Cliente::factory(),
            'bodega_id' => Bodega::factory(),
            'fechaEntrega' => $this->faker->date(),
            'estado' => 'pendiente',
            'cantidad' => $this->faker->numberBetween(1, 10),
        ];
    }
}
