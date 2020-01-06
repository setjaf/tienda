@extends('template/template')

@section('tituloPagina')
    {{$tienda->nombre}}
@endsection

@section('nombreTienda')
    @if (isset($tienda->nombre))
        <h1>{{$tienda->nombre}}</h1>
    @else
        <h1>Tienda</h1>
    @endif
@endsection

@section('contenido')
<div class="row justify-content-center my-auto">

    <div class="col-md-4">
        <a href="{{url('tienda/stock/')}}" class="text-secondary">
            <div class="p-5 text-center">
                <i class="material-icons" style="font-size: 70px">fastfood</i>
                <p>Stock</p>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{url('tienda/proveedores/')}}" class="text-secondary">
            <div class="p-5 text-center">
                <i class="material-icons" style="font-size: 70px">supervisor_account</i>
                <p>Empleados</p>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{url('tienda/caja/')}}" class="text-secondary">
            <div class="p-5 text-center">
                <i class="material-icons" style="font-size: 70px">storefront</i>
                <p>Caja</p>
            </div>
        </a>
    </div>

</div>
@endsection
