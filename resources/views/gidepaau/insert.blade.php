@extends('layouts.app', ['activePage' => 'gidepaau', 'titlePage' => __('gidepaau')])

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
                            <h4 class="card-title">Autores asociados </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th class="text-right">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($autores as $item)
                                                <tr>
                                                    <td>{{$item->innombre}}</td>
                                                    <td class="td-actions text-right">
                                                        <form action="{{route('gidepaau.destroy', $item->idDetalle)}}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="dppatinv" value="{{$patente->id}}">
                                                        </form>
                                                        <button type="button" rel="tooltip" class="btn btn-danger btn-circle" onclick="desasociar({{$item->idDetalle}})"><i class="fas fa-trash"></i></button>
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
                            <h4 class="card-title">{{__('gidepaau')}} </h4>
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
                                    <h5>Patente: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$patente->pititobr}}</h5>
                                </div>
                            </div>
                            <hr>
                            <form action="{{route('gidepaau.store')}}" class="needs-validation" method="POST" id="formAdd" novalidate>
                                @csrf
                                @method('POST')
                                <input type="hidden" name="dppatinv" value="{{$patente->id}}">
                                <input type="hidden" id="token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label>Regional</label>
                                    {!! Form::select('liregion', $regionales, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'liregion', 'required']) !!}
                                    <div class="invalid-feedback">Debe seleccionar la regional</div>
                                </div>
                                <div class="form-group">
                                    <label>Centro de formación</label>
                                    {!! Form::select('licenfor', $centros, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'licenfor', 'required']) !!}
                                    <div class="invalid-feedback">Debe seleccionar el centro de formación</div>
                                </div>
                                <div class="form-group">
                                    <label>Grupo de investigación</label>
                                    {!! Form::select('ligruinv', $grupos, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'ligruinv', 'required']) !!}
                                    <div class="invalid-feedback">Debe seleccionar el grupo de investigación</div>
                                </div>
                                <div class="form-group">
                                    <label>Investigadores</label>
                                    {!! Form::select('dpinvest', [], null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'dpinvest', 'required']) !!}
                                    <div class="invalid-feedback">Debe seleccionar el investigador</div>
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
        $('#liregion').change(function(event){
            $.get("../centros/" + event.target.value, function(response, centros){
                $('#licenfor').empty();
                $('#licenfor').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#licenfor').append("<option value='" + response[i].id + "'>" + response[i].cfnombre + "</option>");
                }
            });
        });
        $('#licenfor').change(function(event){
            $.get("../grupos/" + event.target.value, function(response, grupos){
                $('#ligruinv').empty();
                $('#ligruinv').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#ligruinv').append("<option value='" + response[i].id + "'>" + response[i].ginombre + "</option>");
                }
            });
        });
        $('#ligruinv').change(function(event){
            $.get("../investigadores/" + event.target.value, function(response, investigadores){
                $('#dpinvest').empty();
                $('#dpinvest').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#dpinvest').append("<option value='" + response[i].id + "'>" + response[i].innombre + "</option>");
                }
            });
        });

        function asociar() {
            var form = $('#formAdd');
            var ruta = "{{ route('asociarAutorPa') }}";
            $.ajax({
                url: ruta,
                method: 'POST',
                data: form.serialize(),
                dataType: 'json'
            }).then(function (datos){
                swal({
                title: "¡Hecho!",
                text: "¡Autor asociado con éxito!",
                type: "success"
                }).then(function(e){
                    location.reload();
                })
            },
            function (){
                swal("¡Atención!", "No se pudo asociar el autor", "warning");
            });
        }

        function desasociar(id) {
            swal({
                title: "¿Desasociar?",
                text: "¿Confirma la desasociación del autor?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Si, desasociar",
                cancelButtonText: "No, cancelar",
                reverseButtons: !0
            }).then(function(e) {
                if (e.value === true) {
                    var idunico = id;
                    var rutamala = "{{ route('borrandoAutorPa', "reempl") }}";
                    var rutabuena = rutamala.replace('reempl',idunico);
                    $.ajax({
                        url: rutabuena,
                        method: 'GET'
                    }).then(function (datos){
                        swal({
                            title: "¡Hecho!",
                            text: "¡Se ha desasociado el autor con éxito!",
                            type: "success"
                            }).then(function(e){
                                location.reload();
                            })
                    },
                    function (){
                        swal("¡Atención!", "No se pudo desasociar el autor", "error");
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