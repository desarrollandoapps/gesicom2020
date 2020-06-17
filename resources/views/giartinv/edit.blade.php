@extends('layouts.app', ['activePage' => 'giartinv', 'titlePage' => __('Modificar Artículo')])

@section('searchHidden')
    hidden
@endsection

@section('content')
<div class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Modificar Artículo</h4>
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
                        <form action="{{route('giartinv.update', $articulo->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Tipo de artículo</label>
                                        {!! Form::select('aicodtip', $tiposArticulo, $articulo->aicodtip, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'aicodtip']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Proyecto vinculado</label>
                                        {!! Form::select('aiprovin', $proyectos, $articulo->aiprovin, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'aiprovin']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Título del artículo</label>
                                        <input type="text" class="form-control" name="aititulo" id="aititulo" value="{{$articulo->aititulo}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Página inicial</label>
                                        <input type="text" class="form-control" name="aipagini" id="aipagini" value="{{$articulo->aipagini}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Página final</label>
                                        <input type="text" class="form-control" name="aipagfin" id="aipagfin" value="{{$articulo->aipagfin}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Año de publicación</label>
                                        <input type="text" class="form-control" name="aianopub" id="aianopub" value="{{$articulo->aianopub}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Mes de publicación</label>
                                        <input type="text" class="form-control" name="aimespub" id="aimespub" value="{{$articulo->aimespub}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nombre de la revista</label>
                                        <input type="text" class="form-control" name="ainomrev" id="ainomrev" value="{{$articulo->ainomrev}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Volumen de la revista</label>
                                        <input type="text" class="form-control" name="aivolrev" id="aivolrev" value="{{$articulo->aivolrev}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Serie de la revista</label>
                                        <input type="text" class="form-control" name="aiserrev" id="aiserrev" value="{{$articulo->aiserrev}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Ciudad de publicación</label>
                                        <input type="text" class="form-control" name="aiciupub" id="aiciupub" value="{{$articulo->aiciupub}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Medio de divulgación</label>
                                        <input type="text" class="form-control" name="aimeddiv" id="aimeddiv" value="{{$articulo->aimeddiv}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Código ISSN</label>
                                        <input type="text" class="form-control" name="aicoissn" id="aicoissn" value="{{$articulo->aicoissn}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Código  DOI (Digital Object Identifier)</label>
                                        <input type="text" class="form-control" name="aicoddoi" id="aicoddoi" value="{{$articulo->aicoddoi}}" placeholder="http://www.evento.com">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Página web del evento</label>
                                        <input type="text" class="form-control" name="aisitweb" id="aisitweb" value="{{$articulo->aisitweb}}" placeholder="http://www.evento.com">
                                    </div>
                                </div>

                                <!-- <div class="col">
                                    <div class="form-group">
                                        <label>Ámbito</label>
                                        <select class="custom-select form-control" name="piambito" id="piambito">
                                            <option selected value="">{{__('seleccione')}}</option>
                                            <option value="Local" {{ $articulo->piambito == "Local" ? 'selected' : '' }}>Local</option>
                                            <option value="Nacional" {{ $articulo->piambito == "Nacional" ? 'selected' : '' }}>Nacional</option>
                                            <option value="Internacional" {{ $articulo->piambito == "Internacional" ? 'selected' : '' }}>Internacional</option>
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
