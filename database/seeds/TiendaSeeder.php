<?php

use Illuminate\Database\Seeder;
use App\Models\Tienda;

class TiendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tienda::class,3).create();
    }
}
