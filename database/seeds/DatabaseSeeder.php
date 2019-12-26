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
        ]);

        $this->call(PersonaSeeder::class);

        $this->call(RolSeeder::class);

        $this->call(PermisoSeeder::class);

        $this->call(RolPermisoSeeder::class);

        $this->call(UsuarioSeeder::class);
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        $this->call(ProductoSeeder::class);
        
        $this->call(ProveedorSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

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
