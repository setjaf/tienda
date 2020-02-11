<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';

    protected $casts = [
        'id' => 'string',
        'activo' => 'boolean',
        'vericado' => 'boolean'
    ];

    protected $fillable = [
        'id',
        'producto',
        'formaVenta',
        'idCategoria',
        'idMarca',
        'unidadMedida',
        'tamano',
        'image_url',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'idMarca');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }
}
