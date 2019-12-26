<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';

    public function permisos()
    {
        return $this->belongsToMany(Permiso::class, 'rolPermiso', 'idPermiso', 'idRol');
    }
}
