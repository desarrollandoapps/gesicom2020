@extends('layouts.app', ['activePage' => 'gipatinv', 'titlePage' => __('Modificar Patente')])

@section('searchHidden')
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
                        <h4 class="card-title">Modificar Patente</h4>
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
                        <form action="{{route('gipatinv.update', $patente->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Tipo de patente</label>
                                        {!! Form::select('picodtip', $tiposPatente, $patente->picodtip, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'picodtip']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Proyecto vinculado</label>
                                        {!! Form::select('piprovin', $proyectos, $patente->piprovin, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'piprovin']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Título de la obra</label>
                                        <input type="text" class="form-control" name="pititobr" id="pititobr" value="{{$patente->pititobr}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Número de radicado</label>
                                        <input type="text" class="form-control" name="pinumrad" id="pinumrad" value="{{$patente->pinumrad}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Fecha de solicitud</label>
                                        <div class="input-group date" data-provide="datepicker" id="pifecsol">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="pifecsol" value="{{$patente->pifecsol}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Número de registro</label>
                                        <input type="text" class="form-control" name="pinumreg" id="pinumreg" value="{{$patente->pinumreg}}">
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
