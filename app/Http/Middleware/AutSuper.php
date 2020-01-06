<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AutSuper
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        session_start();

        if (!isset($_SESSION['idUsuario'])) {
            return redirect('super/login');
        }

        $usuario = Usuario::all()->where('id',$_SESSION['idUsuario'])->first();

        if(($usuario->rol->id != 1)){
            return redirect('super/login');
        }

        return $next($request);
    }
}
