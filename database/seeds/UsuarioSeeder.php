<?php

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'idPersona' => '1',
            'idRol' => '1',
            'correo' => 'setjafet@gmail.com',
            'contrasena' => bcrypt('y0s0yp0ll0'),
            'correo_verified_at' => new DateTime('now'),
        ]);
    }
}
