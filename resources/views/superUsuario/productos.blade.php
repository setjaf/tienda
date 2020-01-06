@extends('template/template')

@section('contenido')
<div class="row justify-content-center my-auto">

    <div class="col-12 text-center">
        <a href="{{url('super/productos/nuevo')}}" class="btn btn-primary p-2">
            <i class="material-icons align-bottom">
                add_circle_outline
            </i>
            <span class="">
                Agregar productos
            </span>
        </a>
    </div>
    @unless (empty($productos))
        @foreach ($productos as $producto)
            <div class="col-md-6 my-2">
                <div class="card mx-auto d-flex">

                    <div class="row no-gutters">

                        <div class="col-4 overflow-hidden">
                            <img src="{{url('img/'.$producto->imagen_url)}}" alt="No se encontró la imagen" class="mw-100 mh-100 m-auto">
                        </div>

                        <div class="col-8">
                            <div class="card-body">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{$producto->producto}}</h5>
                                    <small>{{$producto->id}}</small>
                                </div>
                                <p class="card-text">{{$producto->tamano}} {{$producto->unidadMedida}}</p>
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
