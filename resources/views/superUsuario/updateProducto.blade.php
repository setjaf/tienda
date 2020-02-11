@extends('template/template')

@section('contenido')

<div class="row justify-content-center my-auto">
    <div class="w-100 mb-3 mx-3">
        <h2>Editar producto</h2>
        <a href="{{url('/super/productos')}}"> <i class="material-icons align-bottom">undo</i> Regresar a los productos</a>
    </div>

    <form action="" method="POST" class="row col-md-8 justify-content-center" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="form-group col-md-6">
            <label for="id">Codigo de barras del producto:</label>
        <input type="text" name="id" placeholder="750000000000" class="form-control" id="codigo" value="{{$producto->id}}">
        </div>

        <div class="form-group col-md-6">
            <label for="producto">Nombre del producto:</label>
            <input type="text" name="producto" placeholder="Nombre Producto" class="form-control" value="{{$producto->producto}}{{old('producto')}}">
        </div>

        <div class="form-group col-md-6">
            <label for="formaVenta">Forma de venta:</label>
            {{-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-info active">
                    <input type="radio" name="formaVenta" value="2" onclick="$('#group-tamano').show()" autocomplete="off" @if ($producto->formaVenta == 'pieza') checked @endif> pieza
                </label>
                <label class="btn btn-info">
                    <input type="radio" name="formaVenta" value="1" onclick="$('#group-tamano').hide()" autocomplete="off" @if ($producto->formaVenta == 'granel') checked @endif> granel
                </label>
            </div> --}}
            <select name="formaVenta" id="formaVenta" class="form-control" onchange="if($('#formaVenta').val()==1){$('#group-tamano').hide()}else{$('#group-tamano').show()}">
                <option value="2" @if ($producto->formaVenta=='pieza') selected="selected" @endif>pieza</option>
                <option value="1" @if ($producto->formaVenta=='granel') selected="selected" @endif>granel</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="idCategoria">Categoria:</label>
            <select name="idCategoria" id="" class="form-control">
                <option value="">Elige una categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}" @if ($categoria->id==$producto->categoria->id) selected="selected" @endif>{{$categoria->categoria}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="idMarca">Marca:</label>
            <select name="idMarca" id="" class="form-control">
                <option value="">Elige una marca</option>
                @foreach ($marcas as $marca)
                    <option value="{{$marca->id}}" @if ($marca->id==$producto->marca->id) selected="selected" @endif>{{$marca->marca}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="unidadMedida">Tipo unidad de medida:</label>
            <select name="unidadMedida" id="" class="form-control">
                <option value="1" @if ($producto->unidadMedida == 'mL') selected @endif>ml (mililitros)</option>
                <option value="2" @if ($producto->unidadMedida == 'g') selected @endif>g (gramos)</option>
                <option value="3" @if ($producto->unidadMedida == 'u') selected @endif>u (unidades)</option>
            </select>
        </div>

        <div class="form-group col-md-6" id="group-tamano">
            <label for="tamano">Tamaño del producto:</label>
            <input type="number" name="tamano" placeholder="0.00" class="form-control" value="{{$producto->tamano}}">
        </div>

        <div class="form-group col-md-6">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="activo" id="activo" @if ($producto->activo) checked @endif>
                <label class="custom-control-label" for="activo">Activo</label>
            </div>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="verificado" id="verificado" @if ($producto->verificado) checked @endif>
                <label class="custom-control-label" for="verificado">Verificado</label>
            </div>
        </div>

        <div class="w-100"></div>

        <div class="form-group col-md-6" id="group-tamano">
            <label for="tamano">Imagen del producto:</label>
            <div class="text-center overflow-hidden">
                <img id="imagenProductoNueva" class="mw-100">
                <img id="imagenProducto" class="mw-100" src="{{url('img/'.$producto->imagen_url)}}">
            </div>
            <input type="file" name="imagen_url" id="imagen_url" class="form-control">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="eliminarImagen" id="eliminarImagen">
                <label class="custom-control-label" for="eliminarImagen">Eliminar imagen del producto</label>
            </div>
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
            <strong>¡Excelente!</strong> El producto fue editado correctamente.
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
                <h5 class="modal-title" id="confirmacionLabel">Producto no fue editado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Prueba
            </div>
        </div> --}}
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>¡Excelente!</strong> El producto no fue editado.
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
                $('#imagenProductoNueva').attr('src', e.target.result);
                $('#imagenProductoNueva').hide();
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
        $('confirmacion').modal('show');
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
