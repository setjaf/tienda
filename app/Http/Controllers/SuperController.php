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
//----------------------- Login Super Usuario ----------------------------
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
//....................... Login Super Usuario ............................

//----------------------- Productos --------------------------
    function showProductos(){
        return view('superUsuario/productos')
            ->with('productos',Producto::where('activo',true)->orderBy('updated_at','DESC')->get());
    }

    function getCreateProductos(){
        return view('superUsuario/createProducto')
            ->with('categorias',Categoria::where('activo',true)->get())
            ->with('marcas',Marca::where('activo',true)->get());
    }

    function postCreateProductos(Request $request){
        $data = request()->validate([
            'id' => 'required|max:13',
            'producto' => 'required',
            'formaVenta' => 'required',
            'idCategoria'=>'required',
            'idMarca'=>'required',
            'unidadMedida' => 'required',
            'tamano' => 'required_if:formaVenta,2',
            'activo'=>'nullable',
            'verificado'=>'nullable',
        ]);

        $producto = new Producto([
            'id' => $data['id'],
            'producto' => $data['producto'],
            'formaVenta' => $data['formaVenta'],
            'idCategoria' => $data['idCategoria'],
            'idMarca' => $data['idMarca'],
            'unidadMedida' => $data['unidadMedida'],
            'tamano' => $data['tamano'],
            'activo' => !empty($data['activo']),
            'verificado' => !empty($data['verificado']),
        ]);

        if (isset(request()->imagen_url)) {
            $producto->verificado = true;
            $filename = $data['id'].'.'.request()->imagen_url->getClientOriginalExtension();
            request()->imagen_url->move(public_path('img'), $filename);

            $producto->imagen_url=$filename;
        }

        if(!$producto->save()){
            File::delete($filename);
            return redirect()->back()->withInput();
        }else{
            return view('superUsuario/createProducto')
            ->with('categorias',Categoria::where('activo',true)->get())
            ->with('marcas',Marca::where('activo',true)->get())
            ->with('guardado',true);
        }

        return redirect()->back();

    }

    function getUpdateProductos($id)
    {
        return view('superUsuario/updateProducto')
            ->with('producto',Producto::where('activo',true)->where('id',$id)->first())
            ->with('categorias',Categoria::where('activo',true)->get())
            ->with('marcas',Marca::where('activo',true)->get());
    }

    function postUpdateProductos($id){
        $data = request()->validate([
            'id' => 'required|max:13',
            'producto' => 'required',
            'formaVenta' => 'required',
            'idCategoria'=>'required',
            'idMarca'=>'required',
            'unidadMedida' => 'required',
            'tamano' => 'required_if:formaVenta,2',
            'activo'=>'nullable',
            'verificado'=>'nullable',
            'eliminarImagen'=>'nullable',
        ]);

        $producto = Producto::where('id',$data['id'])->first();

        $producto->producto = $data['producto'];
        $producto->formaVenta = $data['formaVenta'];
        $producto->idCategoria = $data['idCategoria'];
        $producto->idMarca = $data['idMarca'];
        $producto->unidadMedida = $data['unidadMedida'];
        $producto->tamano = $data['tamano'];
        $producto->activo = !empty($data['activo']);
        $producto->verificado = !empty($data['verificado']);

        if($producto->save()){
            return view('superUsuario/updateProducto')
                ->with('producto',Producto::where('activo',true)->where('id',$id)->first())
                ->with('categorias',Categoria::where('activo',true)->get())
                ->with('marcas',Marca::where('activo',true)->get())
                ->with('guardado',true);
        }else{
            return view('superUsuario/updateProducto')
                ->with('producto',Producto::where('activo',true)->where('id',$id)->first())
                ->with('categorias',Categoria::where('activo',true)->get())
                ->with('marcas',Marca::where('activo',true)->get())
                ->with('guardado',false);
        }

    }

//....................... Productos ..........................

//-----------------------  Marcas --------------------------
    function showMarcas(){
        return view('superUsuario/marcas')
            ->with('marcas',Marca::where('activo',true)->orderBy('updated_at','DESC')->get());
    }

    function postCreateMarcas(Request $request)
    {
        $data = request()->validate([
            'marca' => 'required',
            'descripcion' => 'required',
            'activo'=>'nullable',
            'verificado'=>'nullable',
        ]);

        $marca = new Marca([
            'marca' => $data['marca'],
            'descripcion' => $data['descripcion'],
            'activo' => !empty($data['activo']),
            'verificado' => !empty($data['verificado']),
        ]);

        if($marca->save()){
            return view('superUsuario/marcas')
                ->with('marcas',Marca::where('activo',true)->orderBy('updated_at','DESC')->get())
                ->with('guardado',true);
        }else{
            return view('superUsuario/marcas')
                ->with('marcas',Marca::where('activo',true)->orderBy('updated_at','DESC')->get())
                ->with('guardado',false);
        }
    }

    function postUpdateMarcas(Request $request)
    {
        //$data = request()->all();
        //dd($data);

        $data = request()->validate([
            'idmarca' => 'required',
            'marca' => 'required',
            'descripcion' => 'required',
            'activo'=>'nullable',
            'verificado'=>'nullable',
        ]);

        //dd($data,empty($data['activo']));

        $marca = Marca::where('id',$data['idmarca'])->first();
        $marca->marca = $data['marca'];
        $marca->descripcion = $data['descripcion'];
        $marca->activo = !empty($data['activo']);
        $marca->verificado = !empty($data['verificado']);

        //dd($marca);

        if($marca->save()){
            return view('superUsuario/marcas')
                ->with('marcas',Marca::where('activo',true)->orderBy('updated_at','DESC')->get())
                ->with('guardado',true);
        }else{
            return view('superUsuario/marcas')
                ->with('marcas',Marca::where('activo',true)->orderBy('updated_at','DESC')->get())
                ->with('guardado',false);
        }
    }

    function postDeleteMarcas(Request $request)
    {
        $data = request()->validate([
            'idmarca' => 'required',
        ]);

        $marca = Marca::where('id',$data['idmarca'])->first();

        $marca->activo = false;

        if($marca->save()){
            return view('superUsuario/marcas')
                ->with('marcas',Marca::where('activo',true)->orderBy('updated_at','DESC')->get())
                ->with('guardado',true);
        }else{
            return view('superUsuario/marcas')
                ->with('marcas',Marca::where('activo',true)->orderBy('updated_at','DESC')->get())
                ->with('guardado',false);
        }
    }

//....................... Marcas ..........................
}
