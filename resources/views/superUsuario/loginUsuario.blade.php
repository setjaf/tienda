@extends('template/template')

@section('contenido')
<div class="row justify-content-center my-auto">
    <form action="" method="POST" class="col-md-4">

        {{ csrf_field() }}

        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="email" name="correo" class="form-control" placeholder="correo@ejemplo.com" value="{{old('correo')}}">
        </div>

        <div class="form-group">
            <label for="usuario">Contraseña:</label>
            <input type="password" name="contrasena" class="form-control" placeholder="contraseña">
        </div>

        <input type="submit" value="Iniciar sesion" class="btn btn-primary">

    </form>
</div>
@endsection
