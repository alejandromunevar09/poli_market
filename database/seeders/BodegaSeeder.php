<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BodegaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Bodega::factory(2)->create();
    }
}
