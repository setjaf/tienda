<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    protected $table = 'tienda';

    protected $casts = [
        'activo' => 'boolean',
        'vericado' => 'boolean',
    ];

    public function administrador()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

    public function gastos()
    {
        return $this->hasMany(Gasto::class, 'idTienda');
    }

    public function stock()
    {
        return $this->hasMany(Stock::class, 'idTienda');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'idTienda');
    }

    public function proveedores()
    {
        return $this->hasMany(Proveedor::class, 'idTienda');
    }

    public function empleados()
    {
        return $this->belongsToMany(Usuario::class, 'usuarioTienda', 'idUsuario', 'idTienda');
    }

    public function pedidos()
    {
        return $this->hasMany(PedidoProveedor::class, 'idTienda');
    }



}
