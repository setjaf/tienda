<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalleVenta';

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'idVenta');
    }
}
