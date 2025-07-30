<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DetalleVentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\DetalleVenta::factory(40)->create();
    }
}
