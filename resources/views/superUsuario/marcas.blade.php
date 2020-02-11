@extends('template/template')

@section('contenido')

<div class="row justify-content-center my-auto">
    <div class="w-100 mb-3 mx-3">
        <a href="{{url('/super/productos')}}"> <i class="material-icons align-bottom">undo</i> Regresar a los productos</a>
    </div>

    <div class="col-12 text-center row justify-content-center">

        <div class="col-md-4">
            <a href="#" class="text-secondary nuevaMarca" data-toggle="modal" data-target="#marcaModal">
                <div class="p-5 text-center">
                    <i class="material-icons" style="font-size: 70px">add_box</i>
                    <p>Agregar marca</p>
                </div>
            </a>
        </div>

    </div>

    <div class="col-12 row">
        @unless (empty($marcas))
        @foreach ($marcas as $marca)
        <div class="col-md-6 my-2 marca">
            <div class="card mx-auto d-flex">

                <div class="row no-gutters">

                    <div class="col-4 overflow-hidden d-flex">
                        <img src="{{url('img/'.$marca->imagen_url)}}" alt="No se encontró la imagen" class="mw-100 mh-100 m-auto">
                    </div>

                    <div class="col-8">
                        <div class="card-body">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{$marca->marca}}</h5>
                                {{-- <small>{{$marca->id}}</small> --}}
                            </div>
                            {{-- <p class="card-text">{{$marca->descripcion}}</p> --}}
                            <a href="#" class="btn btn-link editarMarca" data-toggle="modal" data-target="#marcaModal"
                                data-marca='{{$marca->marca}}'
                                data-idmarca='{{$marca->id}}'
                                data-descripcion='{{$marca->descripcion}}'
                                data-activo='{{$marca->activo}}'
                                data-verificado='{{$marca->verificado}}'
                            >Editar marca</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        @endforeach
        @else
        <div class="col-12 my-2">
            <span class="display-4">No hay marcas registradas</span>
        </div>
        @endunless
    </div>

</div>

@endsection

@section('modales')
<div class="modal fade" id="marcaModal" tabindex="-1" role="dialog" aria-labelledby="marcaModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Marca</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formMarca" action="" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group d-none">
                        <input type="text" class="form-control" name="idmarca">
                    </div>
                    <div class="form-group">
                        <label for="marca" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" name="marca">
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="col-form-label">Descripción:</label>
                        <textarea class="form-control" name="descripcion"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" name="activo" id="activo">
                            <label class="custom-control-label" for="activo">Activo</label>
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" name="verificado" id="verificado">
                            <label class="custom-control-label" for="verificado">Verificado</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="botonEliminarMarca">Delete</button>
                <button type="button" class="btn btn-primary" id="botonFormMarca"></button>
            </div>
        </div>
    </div>
</div>

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
            <strong>¡Excelente!</strong> El marca fue editada correctamente.
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
                <h5 class="modal-title" id="confirmacionLabel">Marca no fue editada</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Prueba
            </div>
        </div> --}}
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>¡Excelente!</strong> El marca no fue editada.
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
        $("a.editarMarca").on("click",function (ev) {
            ev.preventDefault();
            $("#botonEliminarMarca").show();
            $("#botonFormMarca").val("editar");
            $("#botonFormMarca").text("Guardar marca");
            llenarModal($(this)[0].dataset);
        });

        $("a.nuevaMarca").on("click",function (ev) {
            ev.preventDefault();
            $("#botonEliminarMarca").hide();
            $("#botonFormMarca").val("nueva");
            $("#botonFormMarca").text("Agregar marca");
            $('#formMarca').trigger("reset");
        });

        $("#botonFormMarca").on("click", function (ev) {

            $("#formMarca")[0].action = "{{url('super/marcas/')}}/" + $(this).val();

            console.log($("#formMarca"));

            $("#formMarca").submit();

        })

        $("#botonEliminarMarca").on("click", function (ev) {

            if(confirm("¿Estás seguro que quieres eliminar la marca?")){

                $("#formMarca")[0].action = "{{url('super/marcas/eliminar')}}";

                console.log($("#formMarca"));

                $("#formMarca").submit();

            }

        })

        function llenarModal(dataset) {
            var frm = $("#formMarca");
            var campo;
            //console.log(dataset);
            for (campo in dataset) {

                //console.log(frm.find('[name="' + campo + '"]'));

                if (frm.find('[name="' + campo + '"]')[0] != null) {

                    switch (frm.find('[name="' + campo + '"]')[0].type) {
                        case 'checkbox':
                            if (dataset[campo] == true)
                                frm.find('[name="' + campo + '"]')[0].checked=true;
                            break;

                        default:
                            frm.find('[name="' + campo + '"]').val(dataset[campo]);
                            break;
                    }

                }

                //frm.find('[name="' + campo + '"]').val(dataset[campo]);
            }
        }
    </script>

    @isset ($guardado)
    <script>
        $(document).ready(function() {
            $("#confirmacion").modal('show');
        });
    </script>
    @endisset
@endsection
