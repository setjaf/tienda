<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'detallePedido';

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }

    public function pedidoProveedor()
    {
        return $this->belongsTo(PedidoProveedor::class, 'idPedidoProveedor');
    }
}
