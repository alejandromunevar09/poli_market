<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // Crear entidades base
        $clientes = Cliente::factory(10)->create();
        $vendedores = Vendedor::factory(5)->create();
        $productos = Producto::factory(15)->create();
        $bodegas = Bodega::factory(2)->create();

        // Crear ventas dependientes
        Venta::factory(20)->create()->each(function ($venta) use ($productos, $bodegas) {
            // Crear entre 1 y 4 detalles por venta
            $cantidadDetalles = rand(1, 4);
            $detalles = [];

            for ($i = 0; $i < $cantidadDetalles; $i++) {
                $producto = $productos->random();
                $cantidad = rand(1, 5);
                $subtotal = $producto->precio * $cantidad;

                $detalles[] = DetalleVenta::create([
                    'venta_id' => $venta->id,
                    'producto_id' => $producto->id,
                    'cantidad' => $cantidad,
                    'subtotal' => $subtotal,
                ]);
            }

            // Calcular total y guardar en la venta
            $venta->total = collect($detalles)->sum('subtotal');
            $venta->save();

            // Crear entrega para la venta
            Entrega::create([
                'venta_id' => $venta->id,
                'cliente_id' => $venta->cliente_id,
                'bodega_id' => $bodegas->random()->id,
                'fechaEntrega' => now()->addDays(rand(1, 5)),
                'estado' => 'pendiente',
                'cantidad' => collect($detalles)->sum('cantidad'),
            ]);
        });
    }
}
