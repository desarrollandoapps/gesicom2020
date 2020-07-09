@extends('layouts.app', ['activePage' => 'gidetinv', 'titlePage' => __('gidetinv')])

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
                            <h4 class="card-title">Investigadores asociados </h4>
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
                                            @foreach ($investigadoresAsociados as $item)
                                                <tr>
                                                    <td>{{$item->innombre}}</td>
                                                    <td class="td-actions text-right">
                                                        <form action="{{route('gidetinv.destroy', $item->idDetalle)}}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="diproinv" value="{{$proyecto->id}}">
                                                            {{-- <button type="submit" rel="tooltip" class="btn btn-danger btn-circle" onclick="return confirm('¿Confirma la desasociación del investigador?')"><i class="fas fa-trash"></i></button> --}}
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
                            <h4 class="card-title">{{__('gidetinv')}} </h4>
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
                            <form action="{{route('gidetinv.store')}}" class="needs-validation" method="POST" novalidate>
                                @csrf
                                @method('POST')
                                <input type="hidden" name="diproinv" value="{{$proyecto->id}}">
                                <input type="hidden" id="token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label>Regional</label>
                                    {!! Form::select('diregion', $regionales, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'diregion', 'required']) !!}
                                    <div class="invalid-feedback">Debe seleccionar la regional</div>
                                </div>
                                <div class="form-group">
                                    <label>Centro de formación</label>
                                    {!! Form::select('dicenfor', $centros, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'dicenfor', 'required']) !!}
                                    <div class="invalid-feedback">Debe seleccionar el centro de formación</div>
                                </div>
                                <div class="form-group">
                                    <label>Grupo de investigación</label>
                                    {!! Form::select('digruinv', $grupos, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'digruinv', 'required']) !!}
                                    <div class="invalid-feedback">Debe seleccionar el grupo de investigación</div>
                                </div>
                                <div class="form-group">
                                    <label>Investigadores</label>
                                    {!! Form::select('diinvest', $investigadores, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'diinvest', 'required']) !!}
                                    <div class="invalid-feedback">Debe seleccionar el investigador</div>
                                </div>
                        
                                <br>
                                <button type="submit" class="btn btn-primary">Asociar</button>
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
        $('#diregion').change(function(event){
            $.get("../centros/" + event.target.value, function(response, centros){
                $('#dicenfor').empty();
                $('#dicenfor').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#dicenfor').append("<option value='" + response[i].id + "'>" + response[i].cfnombre + "</option>");
                }
            });
        });
        $('#dicenfor').change(function(event){
            $.get("../grupos/" + event.target.value, function(response, grupos){
                $('#digruinv').empty();
                $('#digruinv').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#digruinv').append("<option value='" + response[i].id + "'>" + response[i].ginombre + "</option>");
                }
            });
        });
        $('#digruinv').change(function(event){
            $.get("../investigadores/" + event.target.value, function(response, investigadores){
                $('#diinvest').empty();
                $('#diinvest').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#diinvest').append("<option value='" + response[i].id + "'>" + response[i].innombre + "</option>");
                }
            });
        });

        function desasociar(id) {
            if(!confirm("¿Confirma desvincular al investigador?")) {
                return false;
            }
            var idunico = id;
            var rutamala = "{{ route('borrando', "rempl") }}";
            var rutabuena = rutamala.replace('rempl',idunico);
            alert(rutabuena);
                $.ajax({
                    url: rutabuena,
                    method: 'GET'
                }).then(function (datos){
                    alert("borramos bien");
                    
                },
                function (){
                    alert("No se encontratos datos omg");
                });
        }
        



            // var token =  $('#token').val();

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': token
            //     }
            // });
            

            // var ruta = 'gidetinv/' + id;
            // $.ajax({
            //     url: ruta,
            //     type: 'DELETE',
            //     dataType: 'json',
            //     data: {id: id}
            // });
        // };

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