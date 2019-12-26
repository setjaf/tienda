<?php

use Illuminate\Database\Seeder;
use App\Models\Persona;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persona::create([
            'nombre' => 'Set Jafet',
            'apPaterno' => 'Renedo',
            'apMaterno' => 'Ortega',
            'fechaNacimiento' => new DateTime('1997-06-06'),
            'curp' => 'REOS970606HMCNRT07',
            'rfc' => 'REOS970606CG2',
            'telefono' => '5519621837',
        ]);
    }
}
