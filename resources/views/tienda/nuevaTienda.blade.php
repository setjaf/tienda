@extends('template/template')

@section('tituloPagina')Crear nueva tienda @endsection

@section('contenido')

<div class="row justify-content-center my-auto">
    <div class="w-100 mb-3 mx-3">
        <h2>Crear una nueva tienda</h2>
    </div>
    
    <form action="" class="row col-md-8 justify-content-center">
        
        <div class="form-group col-md-6">
            <label for="nombreTienda">Nombre de la tienda:</label>
            <input type="text" name="nombreTienda" placeholder="Nombre tienda" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label for="calleTienda">Calle:</label>
            <input type="text" name="calleTienda" placeholder="Calle" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label for="numeroTienda">Numero exterior:</label>
            <input type="text" name="numeroTienda" placeholder="0000" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label for="cpTienda">CP:</label>
            <input type="text" name="cpTienda" placeholder="00000" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label for="usuario">Administrador de la tienda:</label>
            <input type="email" name="usuario" class="form-control" placeholder="correo@ejemplo.com">
        </div>

        <div class="form-group col-md-6">
            <label for="usuario">Contraseña administrador:</label>
            <input type="password" name="contrasena" class="form-control" placeholder="contraseña">
        </div>

        <input type="submit" value="Guardar tienda nueva" class="btn btn-primary">

    </form>
</div>
    
@endsection