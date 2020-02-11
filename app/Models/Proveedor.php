<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Proveedor extends Model
{
    protected $table = 'proveedor';

    protected $casts = [
        'activo' => 'boolean',
        'vericado' => 'boolean',
    ];

    public function tienda()
    {
        return $this->belongsTo(Tienda::class, 'idTienda');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'proveedorProducto', 'idProveedor', 'idProducto');
    }

    public function pedidos()
    {
        return $this->hasMany(PedidoProveedor::class, 'idProveedor');
    }
}
