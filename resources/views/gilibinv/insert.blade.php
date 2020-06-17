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
                            <form action="{{route('gilibinv.store')}} " method="POST">
                                @csrf
                                @method('POST')

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Regional</label>
                                            {!! Form::select('piregion', $regionales, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'piregion']) !!}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Centro de formación</label>
                                            {!! Form::select('picenfor', $centros, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'picenfor']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Grupo de investigación vinculado</label>
                                            {!! Form::select('pigruinv', $grupos, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'pigruinv']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Tipo de Libro</label>
                                            {!! Form::select('licodtip', $tiposLibro, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'licodtip']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Proyecto vinculado</label>
                                            {!! Form::select('liprovin', $proyectos, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'liprovin']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Nombre del libro</label>
                                            <input type="text" class="form-control" name="linomlib" id="linomlib" value="{{old('linomlib')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Número de páginas</label>
                                            <input type="text" class="form-control" name="linumpag" id="linumpag" value="{{old('linumpag')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Año de publicación</label>
                                            <input type="text" class="form-control" name="lianopub" id="lianopub" value="{{old('lianopub')}}">
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
                                            <input type="text" class="form-control" name="limespub" id="limespub" value="{{old('limespub')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Día de publicación</label>
                                            <input type="text" class="form-control" name="lidiapub" id="lidiapub" value="{{old('lidiapub')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Editorial</label>
                                            <input type="text" class="form-control" name="lieditor" id="lieditor" value="{{old('lieditor')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Ciudad de publicación</label>
                                            <input type="text" class="form-control" name="liciupub" id="liciupub" value="{{old('liciupub')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Medio de divulgación</label>
                                            <input type="text" class="form-control" name="limeddiv" id="limeddiv" value="{{old('limeddiv')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Código ISBN</label>
                                            <input type="text" class="form-control" name="licoisbn" id="licoisbn" value="{{old('licoisbn')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Página web del libro</label>
                                            <input type="text" class="form-control" name="lisitweb" id="lisitweb" value="{{old('lisitweb')}}" placeholder="http://www.evento.com">
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
    </script>
@endsection
