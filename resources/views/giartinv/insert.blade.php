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
                            <form action="{{route('giartinv.store')}} " method="POST">
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
                                            <label>Tipo de Artículo</label>
                                            {!! Form::select('aicodtip', $tiposArticulo, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'aicodtip']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Proyecto vinculado</label>
                                            {!! Form::select('aiprovin', $proyectos, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'aiprovin']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Título del artículo</label>
                                            <input type="text" class="form-control" name="aititulo" id="aititulo" value="{{old('aititulo')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Página inicial</label>
                                            <input type="text" class="form-control" name="aipagini" id="aipagini" value="{{old('aipagini')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Página final</label>
                                            <input type="text" class="form-control" name="aipagfin" id="aipagfin" value="{{old('aipagfin')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Año de publicación</label>
                                            <input type="text" class="form-control" name="aianopub" id="aianopub" value="{{old('aianopub')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Mes de publicación</label>
                                            <input type="text" class="form-control" name="aimespub" id="aimespub" value="{{old('aimespub')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Nombre de la revista</label>
                                            <input type="text" class="form-control" name="ainomrev" id="ainomrev" value="{{old('ainomrev')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Volumen de la revista</label>
                                            <input type="text" class="form-control" name="aivolrev" id="aivolrev" value="{{old('aivolrev')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Serie de la revista</label>
                                            <input type="text" class="form-control" name="aiserrev" id="aiserrev" value="{{old('aiserrev')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Ciudad de publicación</label>
                                            <input type="text" class="form-control" name="aiciupub" id="aiciupub" value="{{old('aiciupub')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Medio de divulgación</label>
                                            <input type="text" class="form-control" name="aimeddiv" id="aimeddiv" value="{{old('aimeddiv')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Código ISSN</label>
                                            <input type="text" class="form-control" name="aicoissn" id="aicoissn" value="{{old('aicoissn')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Código  DOI (Digital Object Identifier)</label>
                                            <input type="text" class="form-control" name="aicoddoi" id="aicoddoi" value="{{old('aicoddoi')}}">
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
    </script>
@endsection
