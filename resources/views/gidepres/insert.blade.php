@extends('layouts.app', ['activePage' => 'gidepres', 'titlePage' => __('gidepres')])

@section('hidden-search')
    hidden
@endsection

@section('estilos')
    <link rel="stylesheet" href="{{asset('datepicker')}}/bootstrap-datepicker.min.css">
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{__('gidepres')}} </h4>
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
                            <form action="{{route('gidepres.store')}}" class="needs-validation" method="POST" id="formAdd" novalidate>
                                @csrf
                                @method('POST')
                                <input type="hidden" name="dpproinv" value="{{$proyecto->id}}">
                                <input type="hidden" id="token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label>Producto</label>
                                    {!! Form::select('dpproesp', $productos, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'dpproesp', 'required']) !!}
                                    <div class="invalid-feedback">Debe seleccionar el tipo de producto</div>
                                </div>
                                <div class="form-group">
                                    <label>Fecha de avance</label>
                                    <div class="input-group date" data-provide="datepicker" id="dpfecreg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                          </div>
                                        <input type="text" class="form-control" name="dpfecreg" value="{{old('dpfecreg')}}" required>
                                        <div class="invalid-feedback">Debe seleccionar la fecha</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Porcentaje de avance</label>
                                    <input type="number" class="form-control" id="dpporava" name="dpporava" value="{{old('dpporava')}}" min="0" max="100" step="5" required>
                                    <div class="invalid-feedback">Debe ingresar el porcentaje de avance</div>
                                </div>
                                <div class="form-group">
                                    <label>Enlace a evidencia</label>
                                    <input type="text" class="form-control" id="dpenlace" name="dpenlace" value="{{old('dpenlace')}}" min="0" max="100" step="5" placeholder="http://drive.google.com" required>
                                    <div class="invalid-feedback">Debe ingresar el enlace</div>
                                </div>
                        
                                <br>
                                <button type="button" class="btn btn-primary" onclick="asociar()">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </>
        </div>
    </div>
    
@endsection
@section('scripts')
    <script src="{{asset('datepicker')}}/bootstrap-datepicker.min.js"></script>
    <script src="{{asset('adminlte')}}/plugins/moment/moment.min.js"></script>
    <script>
        $('#dpfecreg').datepicker("setDate", new Date());
        $('.date').datepicker({
            format: 'yyyy-mm-dd',
            language: 'es',
            autoclose: true,
        });

        $('select option:first').attr('disabled', true);

        $('#dpproesp').change(function(event){            
            $.get("../porcentajeProducto/" + event.target.value, function(response, porcentaje){
                $('#dpporava').val(response);
            });
        });

        function asociar() {
            var form = $('#formAdd');
            var ruta = "{{ route('crearDetalle') }}";
            $.ajax({
                url: ruta,
                method: 'POST',
                data: form.serialize(),
                dataType: 'json'
            }).then(function (datos){
                swal({
                title: "¡Hecho!",
                text: "Avance registrado con éxito!",
                type: "success"
                }).then(function(e){
                    $('#dpproesp').val('');
                    $('#dpfecreg').val('');
                    $('#dpporava').val('');
                    $('#dpenlace').val('');
                })
            },
            function (){
                swal("¡Atención!", "No se pudo registrar el avance", "warning");
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