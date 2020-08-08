@extends('layouts.app', ['activePage' => 'giproesp', 'titlePage' => __('giproesp')])

@section('hidden-search')
    hidden
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Productos asociados </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Descripción</th>
                                                <th>Tipo</th>
                                                <th class="text-right">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productos as $item)
                                                <tr>
                                                    <td>{{$item->pedespro}}</td>
                                                    <td>{{$item->petippro}}</td>
                                                    <td class="td-actions text-right">
                                                        <form action="#" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{$item->id}}">
                                                        </form>
                                                        <button type="button" rel="tooltip" class="btn btn-danger btn-circle" onclick="desasociar({{$item->id}})"><i class="fas fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{__('giproesp')}} </h4>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $item)
                                            <li> {{$item}} </li>
                                        @endforeach
                                    </ul>    
                                </div>
                                <br>
                            @endif
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Proyecto: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$proyecto->pinompro}}</h5>
                                </div>
                            </div>
                            <hr>
                            <form action="{{route('giproesp.store')}}" class="needs-validation" method="POST" id="formAdd" novalidate>
                                @csrf
                                @method('POST')
                                <input type="hidden" name="peproinv" value="{{$proyecto->id}}">
                                <input type="hidden" id="token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label>Tipo de producto</label>
                                    <select name="petippro" id="petippro" class="custom-select" required>
                                        <option value="">Seleccione...</option>
                                        <option value="Artículo" {{ old('petippro') == "Artículo" ? 'selected' : '' }}>Artículo</option>
                                        <option value="Libro" {{ old('petippro') == "Libro" ? 'selected' : '' }}>Libro</option>
                                        <option value="Patente" {{ old('petippro') == "Patente" ? 'selected' : '' }}>Patente</option>
                                        <option value="Ponencia" {{ old('petippro') == "Ponencia" ? 'selected' : '' }}>Ponencia</option>
                                        <option value="Software" {{ old('petippro') == "Software" ? 'selected' : '' }}>Software</option>
                                    </select>
                                    <div class="invalid-feedback">Debe seleccionar el tipo de producto</div>
                                </div>
                                <div class="form-group">
                                    <label>Descripción del producto</label>
                                    <input type="text" name="pedespro" id="pedespro" class="form-control" required>
                                    <div class="invalid-feedback">Debe ingresar una descripción para el producto</div>
                                </div>
                        
                                <br>
                                <button type="button" class="btn btn-primary" onclick="asociar()">Asociar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@section('scripts')
    <script>
        $('select option:first').attr('disabled', true);

        function asociar() {
            var form = $('#formAdd');
            var ruta = "{{ route('asociarProductoEsperado') }}";
            $.ajax({
                url: ruta,
                method: 'POST',
                data: form.serialize(),
                dataType: 'json'
            }).then(function (datos){
                swal({
                title: "¡Hecho!",
                text: "Producto asociado con éxito!",
                type: "success"
                }).then(function(e){
                    $('#pedespro').val('');
                    location.reload();
                })
            },
            function (){
                swal("¡Atención!", "No se pudo asociar el producto", "warning");
            });
        }

        function desasociar(id) {
            swal({
                title: "Eliminar?",
                text: "¿Confirma la eliminación del producto esperado?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Si, eliminar",
                cancelButtonText: "No, cancelar",
                reverseButtons: !0
            }).then(function(e) {
                if (e.value === true) {
                    var rutamala = "{{ route('borrandoProductoEsperado', "reempl") }}";
                    var rutabuena = rutamala.replace('reempl',id);
                    $.ajax({
                        url: rutabuena,
                        method: 'GET'
                    }).then(function (datos){
                        swal({
                            title: "¡Hecho!",
                            text: "¡Se ha eliminado el producto esperado con éxito!",
                            type: "success"
                            }).then(function(e){
                                location.reload();
                            })
                    },
                    function (){
                        swal("¡Atención!", "No se pudo eliminar el producto esperado", "error");
                    });
                }
                else {
                    return false;
                }
            })
        }

        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                }, false);
                });
            }, false);
        })();
    </script>
@endsection