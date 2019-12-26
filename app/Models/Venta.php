<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'venta';

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

    public function tienda()
    {
        return $this->belongsTo(Tienda::class, 'idTienda');
    }
}
