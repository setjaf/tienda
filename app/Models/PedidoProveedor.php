<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoProveedor extends Model
{
    protected $table = 'pedidoProveedor';

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'idProveedor');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

    public function tienda()
    {
        return $this->belongsTo(Tienda::class, 'idTienda');
    }
}
