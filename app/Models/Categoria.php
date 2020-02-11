<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    protected $casts = [
        'activo' => 'boolean',
        'vericado' => 'boolean',
    ];
}
