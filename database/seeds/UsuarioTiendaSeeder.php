<?php

use Illuminate\Database\Seeder;
use App\Models\UsuarioTienda;

class UsuarioTiendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UsuarioTienda::class)->create([
            'idTienda' => 1,
            'idUsuario' => 1,
        ]);

        factory(UsuarioTienda::class)->create([
            'idTienda' => 1,
            'idUsuario' => 2,
        ]);

        factory(UsuarioTienda::class)->create([
            'idTienda' => 1,
            'idUsuario' => 3,
        ]);

        factory(UsuarioTienda::class)->create([
            'idTienda' => 2,
            'idUsuario' => 1,
        ]);

        factory(UsuarioTienda::class)->create([
            'idTienda' => 2,
            'idUsuario' => 2,
        ]);

        factory(UsuarioTienda::class)->create([
            'idTienda' => 3,
            'idUsuario' => 3,
        ]);
    }
}
