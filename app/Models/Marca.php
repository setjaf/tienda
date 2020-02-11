<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marca';

    protected $casts = [
        'activo' => 'boolean',
        'vericado' => 'boolean',
    ];

    protected $fillable = [
        'marca',
        'descripcion',
        'activo',
        'verificado',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'idMarca');
    }
}
