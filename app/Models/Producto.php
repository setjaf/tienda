<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'idMarca');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }
}
