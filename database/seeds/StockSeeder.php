<?php

use Illuminate\Database\Seeder;
use App\Models\Stock;
use App\Models\Producto;
use App\Models\Tienda;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = Producto::all();
        $tiendas = Tienda::all();

        foreach( $tiendas as $tienda){

            foreach ($productos as $producto ) {
                
                factory(Stock::class)->create([
                    'idTienda' => $tienda->id,
                    'idProducto' => $producto->id,
                ]);

            }

        }
    }
}
