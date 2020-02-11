@extends('template/template')

@section('contenido')
<div class="row justify-content-center my-auto">
    <div class="w-100 mb-3 mx-3">
        <a href="{{url('/super')}}"> <i class="material-icons align-bottom">undo</i> Regresar al inicio</a>
    </div>

    <div class="col-12 text-center row">
        <div class="col-md-4">
            <a href="{{url('super/productos/nuevo')}}" class="text-secondary">
                <div class="p-5 text-center">
                    <i class="material-icons" style="font-size: 70px">add_box</i>
                    <p>Agregar productos</p>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{url('super/marcas/')}}" class="text-secondary">
                <div class="p-5 text-center">
                    <i class="material-icons" style="font-size: 70px">loyalty</i>
                    <p>Marcas</p>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{url('super/categorias/')}}" class="text-secondary">
                <div class="p-5 text-center">
                    <i class="material-icons" style="font-size: 70px">label</i>
                    <p>Categorias</p>
                </div>
            </a>
        </div>
        {{-- <a href="{{url('super/productos/nuevo')}}" class="btn btn-primary p-2">
            <i class="material-icons align-bottom">
                add_circle_outline
            </i>
            <span class="">
                Agregar productos
            </span>
        </a> --}}
    </div>

    <div class="form-group col-12">
        <label for="filtro">Buscar por nombre o código de barras</label>
        <input type="text" id="filtro" class="form-control"/>
    </div>

    <div class="col-12 row overflow-auto lista-producto" style="max-height:500px;">
        @unless (empty($productos))
        @foreach ($productos as $producto)
        <div class="col-md-6 my-2 producto"
            data-nombre='{{$producto->producto}}'
            data-codigo='{{$producto->id}}'
        >
            <div class="card mx-auto d-flex">

                <div class="row no-gutters">

                    <div class="col-4 overflow-hidden d-flex">
                        <img src="{{url('img/'.$producto->imagen_url)}}" alt="No se encontró la imagen" class="mw-100 mh-100 m-auto">
                    </div>

                    <div class="col-8">
                        <div class="card-body">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{$producto->producto}}</h5>
                                <small>{{$producto->id}}</small>
                            </div>
                            <p class="card-text">{{$producto->tamano}} {{$producto->unidadMedida}}</p>
                            <a href="{{url('super/productos/editar/'.$producto->id)}}" class="btn btn-link">Editar producto</a>
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
    </div>

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

@section('scripts')
<script>
    var items = $('div.lista-producto div.producto');
    console.log(items);
    function filtrar($event) {
        items.addClass('d-none').filter(function (item)
        {
            return ($(this)[0].dataset.nombre.toLowerCase().includes($($event.target).val().toLowerCase())) | ($(this)[0].dataset.codigo.includes($($event.target).val().toLowerCase()));
        }).removeClass('d-none');
    }
    $('#filtro').on('keyup change',function ($event) {
        filtrar($event)
    });
</script>
@endsection
