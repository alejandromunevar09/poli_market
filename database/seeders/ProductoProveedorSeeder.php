<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductoProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ProductoProveedor::factory(30)->create();
    }
}
