<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EntregaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Entrega::factory(10)->create();
    }
}
