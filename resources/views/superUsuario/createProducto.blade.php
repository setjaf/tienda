@extends('template/template')

@section('contenido')

<div class="row justify-content-center my-auto">
    <div class="w-100 mb-3 mx-3">
        <h2>Crear un nuevo producto</h2>
    </div>

    <form action="" method="POST" class="row col-md-8 justify-content-center" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="form-group col-md-6">
            <label for="id">Codigo de barras del producto:</label>
            <input type="text" name="id" placeholder="750000000000" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label for="producto">Nombre del producto:</label>
            <input type="text" name="producto" placeholder="Nombre Producto" class="form-control">
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
            <input type="number" name="tamano" placeholder="0.00" class="form-control">
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

        <input type="submit" value="Guardar tienda nueva" class="btn btn-primary">

    </form>

</div>
@endsection

@section('scripts')
<script>
    function readURL(input) {
        console.log(input);
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
            $('#imagenProducto').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imagen_url").change(function() {
        readURL(this);
    });
</script>
@endsection
