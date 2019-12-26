<?php

use Illuminate\Database\Seeder;
use App\Models\ProveedorProducto;

class ProveedorProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Models\ProveedorProducto::class,6)->create();
        ProveedorProducto::create([
            'idProveedor'=> 1,
            'idProducto'=> 1,
        ]);

        ProveedorProducto::create([
            'idProveedor'=> 1,
            'idProducto'=> 2,
        ]);

        ProveedorProducto::create([
            'idProveedor'=> 1,
            'idProducto'=> 3,
        ]);

        ProveedorProducto::create([
            'idProveedor'=> 2,
            'idProducto'=> 1,
        ]);

        ProveedorProducto::create([
            'idProveedor'=> 2,
            'idProducto'=> 2,
        ]);

        ProveedorProducto::create([
            'idProveedor'=> 2,
            'idProducto'=> 3,
        ]);

        ProveedorProducto::create([
            'idProveedor'=> 3,
            'idProducto'=> 1,
        ]);

        ProveedorProducto::create([
            'idProveedor'=> 3,
            'idProducto'=> 2,
        ]);

        ProveedorProducto::create([
            'idProveedor'=> 3,
            'idProducto'=> 3,
        ]);
    }
}
