<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Proveedor::factory(5)->create();

    }
}
