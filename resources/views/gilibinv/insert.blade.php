@extends('layouts.app', ['activePage' => 'gilibinv', 'titlePage' => __('Crear Libro')])

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
                            <h4 class="card-title">Creación de libro</h4>
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
                            <form action="{{route('gilibinv.store')}} " method="POST" class="needs-validation" novalidate>
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
                                            <label>Tipo de Libro</label>
                                            {!! Form::select('licodtip', $tiposLibro, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'licodtip', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar el tipo de libro</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Proyecto vinculado</label>
                                            {!! Form::select('liprovin', $proyectos, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'liprovin', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar el proyecto de investigación vinculado</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Nombre del libro</label>
                                            <input type="text" class="form-control" name="linomlib" id="linomlib" value="{{old('linomlib')}}" required>
                                            <div class="invalid-feedback">Debe ingresar el nombre del libro</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Número de páginas</label>
                                            <input type="number" class="form-control" name="linumpag" id="linumpag" value="{{old('linumpag')}}" required>
                                            <div class="invalid-feedback">Debe ingresar el número de páginas del libro</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Año de publicación</label>
                                            <select name="lianopub" id="lianopub" class="custom-select form-control" required>
                                                <option value="" disabled selected>Seleccione...</option>
                                                @for($i = 2013; $i <= 2030; $i++)
                                                    <option value="{{$i}}"{{ old('lianopub') == $i ? 'selected' : '' }}>{{$i}}</option>
                                                @endfor
                                            </select>
                                            <div class="invalid-feedback">Debe seleccionar el año de publicación del libro</div>
                                        </div>
                                    </div>
                                <!-- <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Fecha de inicio</label>
                                            <div class="input-group date" data-provide="datepicker" id="pifecini">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="pifecini" value="{{old('pifecini')}}">
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
                                                <input type="text" class="form-control" name="pifecfin" value="{{old('pifecfin')}}">
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
                                                <input type="text" class="form-control" name="pifecpon" value="{{old('pifecpon')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                    <div class="col">
                                        <div class="form-group">
                                            <label>Mes de publicación</label>
                                            <select name="limespub" class="custom-select form-control" required>
                                                <option value="" disabled selected>Seleccione...</option>
                                                <option value="1" {{ old('limespub') == "1" ? 'selected' : '' }}>Enero</option>
                                                <option value="2" {{ old('limespub') == "2" ? 'selected' : '' }}>Febrero</option>
                                                <option value="3" {{ old('limespub') == "3" ? 'selected' : '' }}>Marzo</option>
                                                <option value="4" {{ old('limespub') == "4" ? 'selected' : '' }}>Abril</option>
                                                <option value="5" {{ old('limespub') == "5" ? 'selected' : '' }}>Mayo</option>
                                                <option value="6" {{ old('limespub') == "6" ? 'selected' : '' }}>Junio</option>
                                                <option value="7" {{ old('limespub') == "7" ? 'selected' : '' }}>Julio</option>
                                                <option value="8" {{ old('limespub') == "8" ? 'selected' : '' }}>Agosto</option>
                                                <option value="9" {{ old('limespub') == "9" ? 'selected' : '' }}>Septiembre</option>
                                                <option value="10" {{ old('limespub') == "10" ? 'selected' : '' }}>Octubre</option>
                                                <option value="11" {{ old('limespub') == "11" ? 'selected' : '' }}>Noviembre</option>
                                                <option value="12" {{ old('limespub') == "12" ? 'selected' : '' }}>Diciembre</option>
                                            </select>
                                            <div class="invalid-feedback">Debe ingresar el mes de publicación del libro</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Día de publicación</label>
                                            <input type="number" class="form-control" name="lidiapub" id="lidiapub" value="{{old('lidiapub')}}" required>
                                            <div class="invalid-feedback">Debe ingresar el día de publicación del libro</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Editorial</label>
                                            <input type="text" class="form-control" name="lieditor" id="lieditor" value="{{old('lieditor')}}" required>
                                            <div class="invalid-feedback">Debe ingresar la editorial</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Ciudad de publicación</label>
                                            <input type="text" class="form-control" name="liciupub" id="liciupub" value="{{old('liciupub')}}" required>
                                            <div class="invalid-feedback">Debe ingresar la ciudad de publicación del libro</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Medio de divulgación</label>
                                            <input type="text" class="form-control" name="limeddiv" id="limeddiv" value="{{old('limeddiv')}}" required>
                                            <div class="invalid-feedback">Debe ingresar el medio de divulgación del libro</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Código ISBN</label>
                                            <input type="text" class="form-control" name="licoisbn" id="licoisbn" value="{{old('licoisbn')}}" required>
                                            <div class="invalid-feedback">Debe ingresar el código ISBN del libro</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Página web del libro</label>
                                            <input type="text" class="form-control" name="lisitweb" id="lisitweb" value="{{old('lisitweb')}}" placeholder="http://www.evento.com" required>
                                            <div class="invalid-feedback">Debe ingresar la página web del libro</div>
                                        </div>
                                    </div>

                                    <!-- <div class="col">
                                        <div class="form-group">
                                            <label>Ámbito</label>
                                            <select class="custom-select form-control" name="piambito" id="piambito">
                                                <option selected value="">{{__('seleccione')}}</option>
                                                <option value="Local" {{ old('piambito') == "Local" ? 'selected' : '' }}>Local</option>
                                                <option value="Nacional" {{ old('piambito') == "Nacional" ? 'selected' : '' }}>Nacional</option>
                                                <option value="Internacional" {{ old('piambito') == "Internacional" ? 'selected' : '' }}>Internacional</option>
                                            </select>
                                        </div>
                                    </div> -->
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
