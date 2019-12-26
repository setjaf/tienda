<?php

use Illuminate\Database\Seeder;
use App\Models\RolPermiso;

class RolPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RolPermiso::create([
            'idPermiso' => '1',
            'idRol' => '1',
        ]);
    }
}
