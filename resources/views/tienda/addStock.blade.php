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

    <div class="col-md-8">
        @unless (empty($productos))
        <div class="form-group">
            <label for="filtro">Buscar por nombre o código de barras</label>
            <input type="text" id="filtro" class="form-control"/>
        </div>
        <div class="list-group">
            @foreach ($productos as $producto)
            <a href="#" class="list-group-item list-group-item-action"
                id="{{$producto->id}}"
                data-nombre='{{$producto->producto}}'
                data-codigo='{{$producto->id}}'
                data-tamano='{{$producto->tamano}} {{$producto->unidadMedida}}'
                data-formaventa='{{$producto->formaVenta}}'
                data-marcacategoria='{{$producto->marca->marca}} | {{$producto->categoria->categoria}}'
                data-imagen ='{{url('img/'.$producto->imagen_url)}}'
            >
                <div class="row no-gutters" >

                    <div class="col-2 overflow-hidden d-flex">
                        <img src="{{url('img/'.$producto->imagen_url)}}" width="100"alt="No se encontró la imagen" class="mw-100 mh-100 m-auto">
                    </div>

                    <div class="col-10">
                        <div class="card-body">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{$producto->producto}}</h5>
                                <small>{{$producto->id}}</small>
                            </div>
                            <p class="card-text">{{$producto->tamano}} {{$producto->unidadMedida}}</p>
                        </div>
                    </div>

                </div>
            </a>
            @endforeach
        </div>

        @else
            <span class="display-4">No hay productos registrados</span>
        @endunless

    </div>

    <section class="col-12 row" id="card-section">

    </section>

</div>
@endsection

@section('scripts')

<script>
    var items = $('div.list-group a');
    function filtrar($event) {
        items.addClass('d-none').filter(function (item)
        {
            return ($(this)[0].dataset.nombre.toLowerCase().includes($($event.target).val().toLowerCase())) | ($(this)[0].dataset.codigo.includes($($event.target).val().toLowerCase()));
        }).removeClass('d-none');
    }
    $('#filtro').on('keyup change',function ($event) {
        filtrar($event)
    });

    items.on('click',function (ev) {
        ev.preventDefault();

        $('#card-section').append(construirFrom($(this)[0].dataset));

        $(this).css('display','none');

    })

    $(document).on('click', 'a.close-card',function (ev) {
        ev.preventDefault();

        $('#'+$(this)[0].dataset.codigo).css('display','block');
        $($(this)[0].parentElement.parentElement).remove();
    });

    $(document).on('click','input.agregarProducto',function (ev){
        ev.preventDefault();
        var data = FDtoJSON(new FormData($(this)[0].parentElement));
        $.post("",)
    });

    function construirFrom(dataset) {
        return `
        <div class="card col-md-4 position-relative">
            <div class="position-absolute" style="top:10px;right:10px;">
                <a href="#" class="close-card" data-codigo="${dataset.codigo}">
                    <i class="material-icons align-bottom">clear</i>
                </a>
            </div>
            <div style="height:200px;" class="text-center mw-100">
                <img src="${dataset.imagen}" class="mh-100 mw" alt="No se ha encontrado la imagen">
            </div>

            <div class="card-body">
                <h5 class="card-title">${dataset.nombre}</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">${dataset.codigo}</li>
                    <li class="list-group-item">Tamaño: ${dataset.tamano}</li>
                    <li class="list-group-item">Forma de venta: ${dataset.formaventa}</li>
                    <li class="list-group-item">${dataset.marcacategoria}</li>
                </ul>
                <form action="" method="POST" class="row justify-content-center" enctype="multipart/form-data">
                    <div class="form-group col-12 d-none">
                        <label for="idProducto">Código producto</label>
                        <input type="number" name="idProducto" id="idProducto" disabled class="form-control form-control-sm" value="${dataset.codigo}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Precio de venta:</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">$</span>
                            </div>
                            <input type="number" name="precioVenta" class="form-control form-control-sm" placeholder="1000.00">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Precio de compra:</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">$</span>
                            </div>
                            <input type="number" name="precioCompra" class="form-control" placeholder="1000.00">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Cantidad disponible del producto:</label>
                        <input type="number" name="cantidadDisponible" class="form-control form-control-sm" placeholder="1000.00">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Cantidad que debe estar disponible:</label>
                        <input type="number" name="cantidadDeseada" class="form-control form-control-sm" placeholder="1000.00">
                    </div>
                    <div class="w-100"></div>

                    <input type="submit" value="Agregar" class="btn btn-primary">

                </form>
            </div>
        </div>
        `;
    }

    FDtoJSON = function (FormData) {
        let object = {};
        FormData.forEach(
            (value,key)=>{
            object[key]=value;
            }
        );
        return object;
    }


</script>

@endsection
