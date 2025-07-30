<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StockProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\StockProducto::factory(40)->create();
    }
}
