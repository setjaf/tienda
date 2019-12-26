<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    protected $table = 'gasto';

    public function tienda()
    {
        return $this->belongsTo(Tienda::class, 'idTienda');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }
}
