<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'categoria',
            'detallePedido',
            'detalleVenta',
            'gasto',
            'marca',
            'pedidoProveedor',
            'permiso',
            'persona',
            'producto',
            'proveedor',
            'proveedorProducto',
            'rol',
            'rolPermiso',
            'stock',
            'tienda',
            'usuario',
            'venta',
            'usuarioTienda',
        ]);

        $this->call(PersonaSeeder::class);

        $this->call(RolSeeder::class);

        $this->call(PermisoSeeder::class);

        $this->call(RolPermisoSeeder::class);

        $this->call(UsuarioSeeder::class);

        $this->call(TiendaSeeder::class);

        $this->call(UsuarioTiendaSeeder::class);

        $this->call(VentaSeeder::class);

        $this->call(CategoriaSeeder::class);

        $this->call(MarcaSeeder::class);        

        $this->call(ProductoSeeder::class);
        
        $this->call(ProveedorSeeder::class);

        $this->call(StockSeeder::class);

        $this->call(DetalleVentaSeeder::class);

        $this->call(ProveedorProductoSeeder::class);

    }

    public function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
 
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
 
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
