@extends('template/template')

@section('contenido')
<div class="row justify-content-center my-auto">

    <div class="col-md-4">
        <a href="{{url('super/productos/')}}" class="text-secondary">
            <div class="p-5 text-center">
                <i class="material-icons" style="font-size: 70px">fastfood</i>
                <p>Productos</p>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{url('super/usuarios/')}}" class="text-secondary">
            <div class="p-5 text-center">
                <i class="material-icons" style="font-size: 70px">supervisor_account</i>
                <p>Usuarios</p>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{url('super/tiendas/')}}" class="text-secondary">
            <div class="p-5 text-center">
                <i class="material-icons" style="font-size: 70px">storefront</i>
                <p>Tiendas</p>
            </div>
        </a>
    </div>

</div>
@endsection
