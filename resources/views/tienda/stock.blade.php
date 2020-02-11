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

    <div class="col-12 text-center">
        <a href="{{url('tienda/stock/agregar')}}" class="btn btn-primary p-2">
            <i class="material-icons align-bottom">
                add_circle_outline
            </i>
            <span class="">
                Agregar productos al stock
            </span>
        </a>
    </div>
    @unless (empty($stock))
        @foreach ($stock as $producto)
            <div class="col-md-6 my-2">
                <div class="card mx-auto d-flex">

                    <div class="row no-gutters">

                        <div class="col-4 overflow-hidden d-flex">
                            <img src="{{url('img/'.$producto->producto->imagen_url)}}" alt="No se encontró la imagen" class="mw-100 mh-100 m-auto">
                        </div>

                        <div class="col-8">
                            <div class="card-body">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{$producto->producto->producto}}</h5>
                                    <small>{{$producto->producto->tamano}} {{$producto->producto->unidadMedida}}</small>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        {{$producto->cantidadDisponible}} @if ($producto->producto->formaVenta == 'granel')
                                            {{$producto->producto->unidadMedida}}
                                        @else
                                            {{'piezas'}}
                                        @endif
                                    </li>
                                    <li class="list-group-item">${{$producto->precioVenta}}</li>
                                </ul>
                                {{-- <p class="card-text">{{$producto->cantidadDisponible}}</p>
                                <p class="card-text text-muted">{{$producto->producto->id}}</p> --}}
                                <a href="#" class="btn btn-link">Editar producto</a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        @endforeach
    @else
    <div class="col-12 my-2">
        <span class="display-4">No hay productos registrados</span>
    </div>
    @endunless

    <div class="w-100"></div>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
            </li>
        </ul>
    </nav>

</div>
@endsection
