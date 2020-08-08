@extends('layouts.app', ['activePage' => 'giartinv', 'titlePage' => __('Crear Artículo')])

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
                            <h4 class="card-title">Creación de artículo</h4>
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
                            <form action="{{route('giartinv.store')}} " method="POST"  class="needs-validation" novalidate>
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
                                            <label>Tipo de Artículo</label>
                                            {!! Form::select('aicodtip', $tiposArticulo, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'aicodtip', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar el tipo de artículo</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Proyecto vinculado</label>
                                            {!! Form::select('aiprovin', $proyectos, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'aiprovin', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar el proyecto vinculado</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Título del artículo</label>
                                            <input type="text" class="form-control" name="aititulo" id="aititulo" value="{{old('aititulo')}}" required>
                                            <div class="invalid-feedback">Debe ingresar el título del artículo</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Página inicial</label>
                                            <input type="number" class="form-control" name="aipagini" id="aipagini" value="{{old('aipagini')}}" required>
                                            <div class="invalid-feedback">Debe ingresar la página inicial del artículo</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Página final</label>
                                            <input type="number" class="form-control" name="aipagfin" id="aipagfin" value="{{old('aipagfin')}}" required>
                                            <div class="invalid-feedback">Debe ingresar la página final del artículo</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Año de publicación</label>
                                            <select name="aianopub" id="aianopub" class="custom-select form-control" required>
                                                <option value="" disabled selected>Seleccione...</option>
                                                @for($i = 2013; $i <= 2030; $i++)
                                                    <option value="{{$i}}"{{ old('aianopub') == $i ? 'selected' : '' }}>{{$i}}</option>
                                                @endfor
                                            </select>
                                            <div class="invalid-feedback">Debe ingresar el año de publicación del artículo</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Mes de publicación</label>
                                            <select name="aimespub" class="custom-select form-control" required>
                                                <option value="" disabled selected>Seleccione...</option>
                                                <option value="1" {{ old('aimespub') == "1" ? 'selected' : '' }}>Enero</option>
                                                <option value="2" {{ old('aimespub') == "2" ? 'selected' : '' }}>Febrero</option>
                                                <option value="3" {{ old('aimespub') == "3" ? 'selected' : '' }}>Marzo</option>
                                                <option value="4" {{ old('aimespub') == "4" ? 'selected' : '' }}>Abril</option>
                                                <option value="5" {{ old('aimespub') == "5" ? 'selected' : '' }}>Mayo</option>
                                                <option value="6" {{ old('aimespub') == "6" ? 'selected' : '' }}>Junio</option>
                                                <option value="7" {{ old('aimespub') == "7" ? 'selected' : '' }}>Julio</option>
                                                <option value="8" {{ old('aimespub') == "8" ? 'selected' : '' }}>Agosto</option>
                                                <option value="9" {{ old('aimespub') == "9" ? 'selected' : '' }}>Septiembre</option>
                                                <option value="10" {{ old('aimespub') == "10" ? 'selected' : '' }}>Octubre</option>
                                                <option value="11" {{ old('aimespub') == "11" ? 'selected' : '' }}>Noviembre</option>
                                                <option value="12" {{ old('aimespub') == "12" ? 'selected' : '' }}>Diciembre</option>
                                            </select>
                                            <div class="invalid-feedback">Debe seleccionar el mes de publicación del artículo</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Nombre de la revista</label>
                                            <input type="text" class="form-control" name="ainomrev" id="ainomrev" value="{{old('ainomrev')}}" required>
                                            <div class="invalid-feedback">Debe ingresar el nombre de la revista donde se encuentra publicado el artículo</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Volumen de la revista</label>
                                            <input type="text" class="form-control" name="aivolrev" id="aivolrev" value="{{old('aivolrev')}}" required>
                                            <div class="invalid-feedback">Debe ingresar el volumen de la revista donde se encuentra publicado el artículo</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Serie de la revista</label>
                                            <input type="text" class="form-control" name="aiserrev" id="aiserrev" value="{{old('aiserrev')}}" required>
                                            <div class="invalid-feedback">Debe ingresar la serie de la revista donde se encuentra publicado el artículo</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Ciudad de publicación</label>
                                            <input type="text" class="form-control" name="aiciupub" id="aiciupub" value="{{old('aiciupub')}}" required>
                                            <div class="invalid-feedback">Debe ingresar la ciudad origen de la revista donde se encuentra publicado el artículo</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Medio de divulgación</label>
                                            <select name="aimeddiv" class="custom-select form-control" required>
                                                <option value="" disabled selected>Seleccione...</option>
                                                <option value="Digital" {{ old('aimeddiv') == "Digital" ? 'selected' : '' }}>Digital</option>
                                                <option value="Físico" {{ old('aimeddiv') == "Físico" ? 'selected' : '' }}>Físico</option>
                                            </select>
                                            <div class="invalid-feedback">Debe ingresar el medio de divulgación del artículo</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Código ISSN</label>
                                            <input type="text" class="form-control" name="aicoissn" id="aicoissn" value="{{old('aicoissn')}}" required>
                                            <div class="invalid-feedback">Debe ingresar el código ISSN de la revista donde se encuentra publicado el artículo</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Código  DOI (Digital Object Identifier)</label>
                                            <input type="text" class="form-control" name="aicoddoi" id="aicoddoi" value="{{old('aicoddoi')}}" required>
                                            <div class="invalid-feedback">Debe ingresar el código DOI del artículo</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Página web de la revista</label>
                                            <input type="text" class="form-control" name="aisitweb" id="aisitweb" value="{{old('aisitweb')}}" placeholder="http://www.evento.com">
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
