@extends('layouts.app', ['activePage' => 'gisofinv', 'titlePage' => __('Creación de Software')])

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
                            <h4 class="card-title">Creación de {{ __('gisofinv') }}</h4>
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
                            <form action="{{route('gisofinv.store')}} " class="needs-validation" method="POST" novalidate>
                                @csrf
                                @method('POST')
                        
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Regional</label>
                                            {!! Form::select('siregion',$regionales, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'siregion', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar la regional</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Centro de formación</label>
                                            {!! Form::select('sicenfor', $centros, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'sicenfor', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar el centro de formación</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Grupo de investigación vinculado</label>
                                            {!! Form::select('sigruinv', $grupos, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'sigruinv', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar el grupo de investigación</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Proyecto vinculado</label>
                                            {!! Form::select('siprovin', $proyectos, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'siprovin', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar el proyecto</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Título de la obra</label>
                                            <input type="text" class="form-control" name="sititobr" id="sititobr" value="{{old('sititobr')}}" required>
                                            <div class="invalid-feedback">Debe ingresar el título de la obra</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Número de radicado</label>
                                            <input type="text" class="form-control" name="sinumrad" id="sinumrad" value="{{old('sinumrad')}}" required>
                                            <div class="invalid-feedback">Debe ingresar el número de radicado</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Fecha de solicitud</label>
                                            <div class="input-group date" data-provide="datepicker" id="sifecrad">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="sifecrad" value="{{old('sifecrad')}}" required>
                                                <div class="invalid-feedback">Debe ingresar la fecha de solicitud</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Estado del trámite</label>
                                            <select name="siesttra" id="siesttra" class="custom-select form-control" required>
                                                <option value="" disabled selected>Seleccione</option>
                                                <option value="En trámite" {{ old('siesttra') == "En trámite" ? 'selected' : '' }}>En trámite</option>
                                                <option value="Registrado" {{ old('siesttra') == "Registrado" ? 'selected' : '' }}>Registrado</option>
                                                <option value="Devuelto" {{ old('siesttra') == "Devuelto" ? 'selected' : '' }}>Devuelto</option>
                                            </select>
                                            <div class="invalid-feedback">Debe seleccionar el estado del trámite</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Número de registro</label>
                                            <input type="text" class="form-control" name="sinumreg" id="sinumreg" value="{{old('sinumreg')}}">
                                            <div class="invalid-feedback">Si no tiene número de registro, por favor escriba "No aplica"</div>
                                        </div>
                                    </div>
                                </div>
                        
                                <br>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
    <script src="{{asset('datepicker')}}/bootstrap-datepicker.min.js"></script>
    <script>
        $('select option:first').attr('disabled', true);
        $('.date').datepicker({
            format: 'yyyy-mm-dd',
            language: 'es',
            autoclose: true,
        });
        $('#siregion').change(function(event){            
            $.get("../centros/" + event.target.value, function(response, centros){
                $('#sicenfor').empty();
                $('#sicenfor').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#sicenfor').append("<option value='" + response[i].id + "'>" + response[i].cfnombre + "</option>");
                }
            });
        });
        $('#sicenfor').change(function(event){            
            $.get("../grupos/" + event.target.value, function(response, grupos){
                $('#sigruinv').empty();
                $('#sigruinv').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#sigruinv').append("<option value='" + response[i].id + "'>" + response[i].ginombre + "</option>");
                }
            });
        });
        $('#sigruinv').change(function(event){
            $.get("../proyectos/" + event.target.value, function(response, proyectos){
                $('#siprovin').empty();
                $('#siprovin').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#siprovin').append("<option value='" + response[i].id + "'>" + response[i].pinompro + "</option>");
                }
            });
        });

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