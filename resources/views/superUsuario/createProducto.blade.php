@extends('template/template')

@section('contenido')

<div class="row justify-content-center my-auto">
    <div class="w-100 mb-3 mx-3">
        <h2>Crear un nuevo producto</h2>
        <a href="{{url('/super/productos')}}"> <i class="material-icons align-bottom">undo</i> Regresar a los productos</a>
    </div>

    <form action="" method="POST" class="row col-md-8 justify-content-center" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="form-group col-md-6">
            <label for="id">Codigo de barras del producto:</label>
            <input type="text" name="id" placeholder="750000000000" class="form-control" id="codigo" autofocus>
        </div>

        <div class="form-group col-md-6">
            <label for="producto">Nombre del producto:</label>
            <input type="text" name="producto" placeholder="Nombre Producto" class="form-control" value="{{old('producto')}}">
        </div>

        <div class="form-group col-md-6">
            <label for="formaVenta">Forma de venta:</label>
            <select name="formaVenta" id="formaVenta" class="form-control" onchange="if($('#formaVenta').val()==1){$('#group-tamano').hide()}else{$('#group-tamano').show()}">
                <option value="2">pieza</option>
                <option value="1">granel</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="idCategoria">Categoria:</label>
            <select name="idCategoria" id="" class="form-control">
                <option value="">Elige una categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="idMarca">Marca:</label>
            <select name="idMarca" id="" class="form-control">
                <option value="">Elige una marca</option>
                @foreach ($marcas as $marca)
                    <option value="{{$marca->id}}">{{$marca->marca}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="unidadMedida">Tipo unidad de medida:</label>
            <select name="unidadMedida" id="" class="form-control">
                <option value="1">ml (mililitros)</option>
                <option value="2">g (gramos)</option>
                <option value="3">u (unidades)</option>
            </select>
        </div>

        <div class="form-group col-md-6" id="group-tamano">
            <label for="tamano">Tamaño del producto:</label>
            <input type="number" name="tamano" placeholder="0.00" class="form-control" value="{{old('tamano')}}">
        </div>

        <div class="form-group col-md-6">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="activo" id="activo" checked @if (old('activo')) checked @endif>
                <label class="custom-control-label" for="activo">Activo</label>
            </div>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="verificado" id="verificado" @if (old('verificado')) checked @endif>
                <label class="custom-control-label" for="verificado">Verificado</label>
            </div>
        </div>

        <div class="w-100"></div>

        <div class="form-group col-md-6" id="group-tamano">
            <label for="tamano">Imagen del producto:</label>
            <div class="text-center overflow-hidden">
                <img id="imagenProducto" class="mw-100">
            </div>
            <input type="file" name="imagen_url" id="imagen_url" placeholder="0.00" class="form-control">
        </div>

        <div class="w-100"></div>

        <input type="submit" value="Guardar producto nuevo" class="btn btn-primary">

    </form>

</div>
@endsection

@section('modales')
@isset ($guardado)
@if ($guardado)
<div class="modal fade" id="confirmacion" tabindex="-1" role="dialog" aria-labelledby="confirmacionLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered text-success" role="document">
        {{-- <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmacionLabel">Producto editado correctamente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Prueba
            </div>
        </div> --}}
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>¡Excelente!</strong> El producto fue creado correctamente.
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@else
<div class="modal fade" id="confirmacion" tabindex="-1" role="dialog" aria-labelledby="confirmacionLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        {{-- <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmacionLabel">Producto no fue creado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Prueba
        </div> --}}
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>¡Excelente!</strong> El producto no fue creado.
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif
@endisset

@endsection

@section('scripts')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
            $('#imagenProducto').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    //$('#codigo').on('keypress',function (ev) {
    //   ev.preventDefault();
    //});

    $(document).ready(function() {
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
            event.preventDefault();
            return false;
            }
        });
    });

    $("#imagen_url").change(function() {
        readURL(this);
    });
</script>

@isset ($guardado)
<script>
    $(document).ready(function() {
        $("#confirmacion").modal('show');
    });
</script>
@endisset
@endsection
