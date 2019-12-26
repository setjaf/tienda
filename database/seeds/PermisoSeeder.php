<?php

use Illuminate\Database\Seeder;
use App\Models\Permiso;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permiso::create([
            'permiso' => 'agregarUsuario',
            'descripcion' => 'Tiene la posibilidad de crear un nuevo usuario.'
        ]);
    }
}
