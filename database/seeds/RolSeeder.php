<?php

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([
            'rol' => 'superUsuario',
            'descripcion' => 'Este usuario tiene permiso de realizar cualquier acción dentro del sistema, así que está asociado a todo los permiso.',
        ]);
    }
}
