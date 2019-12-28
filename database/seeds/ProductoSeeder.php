<?php

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $categorias = Categoria::all();
        $marcas = Marca::all();
        
        foreach ($categorias as $categoria ) {
            foreach ($marcas as $marca ) {
                factory(Producto::class)->create([
                    'idCategoria' => $categoria->id,
                    'idMarca' => $marca->id,
                ]);
            }
        }

        
    }
}
