@extends('layouts.app', ['activePage' => 'giponinv', 'titlePage' => __('Crear Ponencia')])

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
                            <h4 class="card-title">Creación de ponencia</h4>
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
                            <form action="{{route('giponinv.store')}} " method="POST" class="needs-validation" novalidate>
                                @csrf
                                @method('POST')

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Regional</label>
                                            {!! Form::select('piregion', $regionales, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'piregion', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar la regional</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Centro de formación</label>
                                            {!! Form::select('picenfor', $centros, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'picenfor', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar el centro de formación</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Grupo de investigación vinculado</label>
                                            {!! Form::select('pigruinv', $grupos, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'pigruinv', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar el grupo de investigación</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Línea de investigación</label>
                                            {!! Form::select('pilinvin', $lineas, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'pilinvin', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar la línea de investigación</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Tipo de ponencia</label>
                                            {!! Form::select('picodtip', $tiposPonencia, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'picodtip', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar el tipo de ponencia</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Proyecto vinculado</label>
                                            {!! Form::select('piprovin', $proyectos, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'piprovin', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar el proyecto de investigación vinculado</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Título de la ponencia</label>
                                            <input type="text" class="form-control" name="pititulo" id="pititulo" value="{{old('pititulo')}}" required>
                                            <div class="invalid-feedback">Debe ingresar el título de la ponencia</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Nombre del evento</label>
                                            <input type="text" class="form-control" name="pievento" id="pievento" value="{{old('pievento')}}" required>
                                            <div class="invalid-feedback">Debe ingresar el nombre del evento</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Fecha de inicio</label>
                                            <div class="input-group date" data-provide="datepicker" id="pifecini">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="pifecini" value="{{old('pifecini')}}" required>
                                                <div class="invalid-feedback">Debe seleccionar la fecha de inicio del evento</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Fecha de finalización</label>
                                            <div class="input-group date" data-provide="datepicker" id="pifecfin">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="pifecfin" value="{{old('pifecfin')}}" required>
                                                <div class="invalid-feedback">Debe seleccionar la fecha de finzalización del evento</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Fecha de la ponencia</label>
                                            <div class="input-group date" data-provide="datepicker" id="pifecpon">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="pifecpon" value="{{old('pifecpon')}}" required>
                                                <div class="invalid-feedback">Debe seleccionar la fecha de la presentación de la ponencia</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Ciudad</label>
                                            <input type="text" class="form-control" name="piciudad" id="piciudad" value="{{old('piciudad')}}" required>
                                            <div class="invalid-feedback">Debe seleccionar la ciudad del evento</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Página web del evento</label>
                                            <input type="text" class="form-control" name="pipagweb" id="pipagweb" value="{{old('pipagweb')}}" placeholder="http://www.evento.com">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Ámbito</label>
                                            <select class="custom-select form-control" name="piambito" id="piambito" required>
                                                <option selected value="">{{__('seleccione')}}</option>
                                                <option value="Local" {{ old('piambito') == "Local" ? 'selected' : '' }}>Local</option>
                                                <option value="Nacional" {{ old('piambito') == "Nacional" ? 'selected' : '' }}>Nacional</option>
                                                <option value="Internacional" {{ old('piambito') == "Internacional" ? 'selected' : '' }}>Internacional</option>
                                            </select>
                                            <div class="invalid-feedback">Debe seleccionar el ámbito del evento</div>
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
        $('.date').datepicker({
            format: 'yyyy-mm-dd',
            language: 'es',
            autoclose: true,
        });
        $('#piregion').change(function(event){
            $.get("../centros/" + event.target.value, function(response, centros){
                $('#picenfor').empty();
                $('#picenfor').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#picenfor').append("<option value='" + response[i].id + "'>" + response[i].cfnombre + "</option>");
                }
            });
        });
        $('#picenfor').change(function(event){
            $.get("../grupos/" + event.target.value, function(response, grupos){
                $('#pigruinv').empty();
                $('#pigruinv').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#pigruinv').append("<option value='" + response[i].id + "'>" + response[i].ginombre + "</option>");
                }
            });
        });
        $('#pigruinv').change(function(event){
            $.get("../semilleros/" + event.target.value, function(response, semilleros){
                $('#pisemill').empty();
                for(i = 0; i < response.length; i++)
                {
                    $('#pisemill').append("<option value='" + response[i].id + "'>" + response[i].senombre + "</option>");
                }
            });
            $.get("../lineas/" + event.target.value, function(response, lineas){
                $('#pilininv').empty();
                $('#pilininv').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#pilininv').append("<option value='" + response[i].id + "'>" + response[i].lideslin + "</option>");
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
