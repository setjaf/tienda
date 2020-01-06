<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tienda;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class TiendaController extends Controller
{
    function index(){

        $tienda = Tienda::all()->where('id',$_SESSION['idTienda'])->first();
        $usuario = Usuario::all()->where('id',$_SESSION['idUsuario'])->first();
        return view('tienda/indexTienda')
                ->with('tienda',$tienda)
                ->with('usuario',$usuario);

    }

    function getProductoNuevo(){
        session_start();
        if(isset($_SESSION['idTienda'])){

            if (isset($_SESSION['idUsuario'])) {

                $tienda = Tienda::all()->where('id',$_SESSION['idTienda'])->first();
                $usuario = Usuario::all()->where('id',$_SESSION['idUsuario'])->first();
                return view('tienda/productos/nuevo')
                        ->with('tienda',$tienda)
                        ->with('usuario',$usuario);

            }else{

                return redirect('tienda/usuario');

            }

        }else{
            return redirect('tienda/login');
        }
    }

    function getLogin(){

        $tiendas = Tienda::all();

        return view('tienda/loginTienda')->with('tiendas',$tiendas);
    }

    function postLogin(Request $request){

        $data = request()->validate([
            'idTienda' => 'required',
            'correo' => 'required',
            'contrasena' => 'required'
        ], [
            'idTienda.required' => 'Debes seleccionar una tienda',
            'correo.required' => 'Debes colocar el correo del administrador',
            'contrasena.required' => 'Debes colocar la contraseña de administrador'
        ]);

        $tienda = Tienda::all()->where('id',$data['idTienda'])->first();



        if($tienda->administrador->correo == $data['correo']){
            if(Hash::check($data['contrasena'], $tienda->administrador->contrasena)){

                session_start();
                $_SESSION['idTienda'] = $tienda->id;
                if(isset($_SESSION['idUsuario'])){
                    $usuario = Usuario::all()->where('id',$_SESSION['idUsuario'])->first();
                    if($usuario->rol == 1 | $tienda->administrador->id == $usuario->id ){
                        redirect('tienda');
                    }
                }
                return redirect('tienda/usuario');

            }
        }

        return redirect()->back()->withInput($request->input());

    }

    function getLoginUsuario(){

        session_start();

        if(isset($_SESSION['idTienda'])){
            $idTienda = $_SESSION['idTienda'];
            $tienda = Tienda::all()->where('id',$idTienda)->first();
            return view('tienda/loginUsuarioTienda')->with('tienda', $tienda);
        }else{
            return redirect('tienda/login');
        }

    }

    function postLoginUsuario(Request $request){

        $data = request()->validate([
            'correo' => 'required',
            'contrasena' => 'required'
        ], [
            'correo.required' => 'Debes colocar el correo del administrador',
            'contrasena.required' => 'Debes colocar la contraseña de administrador'
        ]);

        session_start();

        $tienda = Tienda::all()->where('id',$_SESSION['idTienda'])->first();

        $usuario = $tienda->empleados()->where('correo',$data['correo'])->first();

        if(isset($usuario)){
            if(Hash::check($data['contrasena'], $usuario->contrasena)){

                $_SESSION['idUsuario'] = $usuario->id;

                return redirect('tienda');

            }
        }

        return redirect()->back()->withInput($request->input());
    }
}
