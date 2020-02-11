<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario';

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'idPersona');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'idRol');
    }

    public function tiendas()
    {
        return $this->hasMany(Tienda::class, 'idUsuario');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedidos::class, 'idUsuario');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'correo', 'idPersona','idRol', 'contrasena',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'contrasena', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'correo_verified_at' => 'datetime',
        'activo' => 'boolean',
    ];
}
