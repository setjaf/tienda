<?php

namespace App\Http\Controllers;

use App\Models\Producto;
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

    // -------------------- Iniciar una tienda ----------------
    function getLogin(){

        $tiendas = Tienda::all();

        return view('tienda/loginTienda')->with('tiendas',$tiendas);
    }

    function postLogin(Request $request){
        /* ** Valida que la información del formulario sea valida, de no ser así,
        se regresa la misma página con la información que se envió en el formulario ** */
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


        /* ** Verifica si el usuario que se utiliza para abrir el sistema de la
        tienda es administrador de la misma o es un super usuario. ** */
        if($tienda->administrador->correo == $data['correo'] | Usuario::where('correo',$data['correo'])->first()->rol->id == 1){
            // ** Verifica que la contraseña sea correcta **
            if(Hash::check($data['contrasena'], $tienda->administrador->contrasena)){

                session_start();
                $_SESSION['idTienda'] = $tienda->id;
                //Redirecciona a la tienda, si no hay usuario con sesión iniciada el middleware hará una redirección a 'tienda/usuario'
                return redirect('tienda');

            }
        }

        return redirect()->back()->withInput($request->input());

    }
    // .................... Iniciar una tienda ................

    // -------------------- Login usuario empleado/administrador/super ----------------------
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
        /* ** Valida que la información del formulario sea valida, de no ser así,
        se regresa la misma página con la información que se envió en el formulario ** */
        $data = request()->validate([
            'correo' => 'required',
            'contrasena' => 'required'
        ], [
            'correo.required' => 'Debes colocar el correo del usuario',
            'contrasena.required' => 'Debes colocar la contraseña de usuario'
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
    // .................... Login usuario empleado/administrador/super ......................

    // -------------------- Stock ------------------------
    function showStock(Request $request){
        return view('tienda/stock')
            ->with('stock',Tienda::where('id',$_SESSION['idTienda'])->first()->stock()->where('activo',true)->orderBy('updated_at','DESC')->get())
            ->with('tienda',Tienda::where('id',$_SESSION['idTienda'])->first());
    }

    function getAddStock(){
        $tienda = Tienda::where('id',$_SESSION['idTienda'])->first();
        return view('tienda/addStock')
            ->with('tienda',$tienda)
        ->with('productos',Producto::where('activo',true)->whereNotIn('id',$tienda->stock()->get('idProducto'))->get());
    }

    function postAddStock(){

        $data = request()->validate([
            'idProducto' => 'required',
            'precioVenta' => 'required',
            'precioCompra' => 'required',
            'cantidadDisponible' => 'required',
            'cantidadDeseada' => 'required'
        ]);
        return $_SESSION[''];
    }
    // .................... Stock ........................

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
}
