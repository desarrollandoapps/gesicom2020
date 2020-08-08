@extends('layouts.app', ['activePage' => 'gilibinv', 'titlePage' => __('Modificar Libro')])

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
                        <h4 class="card-title">Modificar Libro</h4>
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
                        <form action="{{route('gilibinv.update', $libro->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Tipo de libro</label>
                                        {!! Form::select('licodtip', $tiposLibro, $libro->licodtip, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'licodtip']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Proyecto vinculado</label>
                                        {!! Form::select('liprovin', $proyectos, $libro->liprovin, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'liprovin']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nombre del libro</label>
                                        <input type="text" class="form-control" name="linomlib" id="linomlib" value="{{$libro->linomlib}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Número de páginas</label>
                                        <input type="text" class="form-control" name="linumpag" id="linumpag" value="{{$libro->linumpag}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Año de publicación</label>
                                        <input type="text" class="form-control" name="lianopub" id="lianopub" value="{{$libro->lianopub}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Mes de publicación</label>
                                        <input type="text" class="form-control" name="limespub" id="limespub" value="{{$libro->limespub}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Día de publicación</label>
                                        <input type="text" class="form-control" name="lidiapub" id="lidiapub" value="{{$libro->lidiapub}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Editorial</label>
                                        <input type="text" class="form-control" name="lieditor" id="lieditor" value="{{$libro->lieditor}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Ciudad de publicación</label>
                                        <input type="text" class="form-control" name="liciupub" id="liciupub" value="{{$libro->liciupub}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Medio de divulgación</label>
                                        <input type="text" class="form-control" name="limeddiv" id="limeddiv" value="{{$libro->limeddiv}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Código ISBN</label>
                                        <input type="text" class="form-control" name="licoisbn" id="licoisbn" value="{{$libro->licoisbn}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Página web del evento</label>
                                        <input type="text" class="form-control" name="lisitweb" id="lisitweb" value="{{$libro->lisitweb}}" placeholder="http://www.evento.com">
                                    </div>
                                </div>

                                <!-- <div class="col">
                                    <div class="form-group">
                                        <label>Ámbito</label>
                                        <select class="custom-select form-control" name="piambito" id="piambito">
                                            <option selected value="">{{__('seleccione')}}</option>
                                            <option value="Local" {{ $libro->piambito == "Local" ? 'selected' : '' }}>Local</option>
                                            <option value="Nacional" {{ $libro->piambito == "Nacional" ? 'selected' : '' }}>Nacional</option>
                                            <option value="Internacional" {{ $libro->piambito == "Internacional" ? 'selected' : '' }}>Internacional</option>
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
