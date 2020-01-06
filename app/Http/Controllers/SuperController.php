<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Support\Facades\File;

class SuperController extends Controller
{
    function index(){

        return view('superUsuario/indexUsuario');

    }

    function getLogin(){

        return view('superUsuario/loginUsuario');

    }

    function postLogin(Request $request){

        session_start();

        $data = request()->validate([
            'correo' => 'required',
            'contrasena' => 'required'
        ], [
            'correo.required' => 'Debes colocar el correo del administrador',
            'contrasena.required' => 'Debes colocar la contraseña de administrador'
        ]);

        $usuario = Usuario::all()->where('correo',$data['correo'])->first();

        if ($usuario->rol->id == 1) {
            if(isset($usuario)){
                if(Hash::check($data['contrasena'], $usuario->contrasena)){

                    $_SESSION['idUsuario'] = $usuario->id;

                    return redirect('super/');

                }
            }
        }

        return redirect()->back()->withInput($request->input());
    }

    function showProductos(){
        return view('superUsuario/productos')
            ->with('productos',Producto::orderBy('updated_at','DESC')->get());
    }

    function getCreateProductos(){
        return view('superUsuario/createProducto')
            ->with('categorias',Categoria::all())
            ->with('marcas',Marca::all());
    }

    function postCreateProductos(Request $request)
    {
        $data = request()->validate([
            'id' => 'required|max:13',
            'producto' => 'required',
            'formaVenta' => 'required',
            'idCategoria'=>'required',
            'idMarca'=>'required',
            'unidadMedida' => 'required',
            'tamano' => 'required_if:formaVenta,2',
        ]);

        $producto = new Producto([
            'id' => $data['id'],
            'producto' => $data['producto'],
            'formaVenta' => $data['formaVenta'],
            'idCategoria' => $data['idCategoria'],
            'idMarca' => $data['idMarca'],
            'unidadMedida' => $data['unidadMedida'],
            'tamano' => $data['tamano'],
        ]);

        $producto->verificado = true;
        $filename = $data['id'].'.'.request()->imagen_url->getClientOriginalExtension();
        request()->imagen_url->move(public_path('img'), $filename);

        $producto->imagen_url=$filename;

        if(!$producto->save()){
            File::delete($filename);
        }

        return redirect()->back()->withInput();

    }
}
