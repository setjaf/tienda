<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Usuario;

class AutTienda
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
        if (!isset($_SESSION['idTienda'])) {
            return redirect('tienda/login');
        }elseif(!isset($_SESSION['idUsuario'])){
            return redirect('tienda/usuario');
        }
        return $next($request);
    }
}
