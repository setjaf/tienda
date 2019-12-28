<?php

use Illuminate\Database\Seeder;
use App\Models\DetalleVenta;
use App\Models\Venta;
use App\Models\Stock;

class DetalleVentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ventas = Venta::all();
        $stocks = Stock::all();

        foreach ($ventas as $venta ) {
            foreach ($stocks as $stock) {
                factory(DetalleVenta::class)->create([
                    'idVenta' => $venta->id,
                    'idStock' => $stock->id,
                ]);
            }
        }
    }
}
