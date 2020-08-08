@extends('layouts.app', ['activePage' => 'giponinv', 'titlePage' => __('Modificar Ponencia')])

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
                        <h4 class="card-title">Modificar Ponencia</h4>
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
                        <form action="{{route('giponinv.update', $ponencia->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                        
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Línea de investigación</label>
                                        {!! Form::select('pilinvin', $lineas, $ponencia->pilinvin, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'pilinvin']) !!}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Tipo de ponencia</label>
                                        {!! Form::select('picodtip', $tiposPonencia, $ponencia->picodtip, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'picodtip']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Proyecto vinculado</label>
                                        {!! Form::select('piprovin', $proyectos, $ponencia->piprovin, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'piprovin']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Título de la ponencia</label>
                                        <input type="text" class="form-control" name="pititulo" id="pititulo" value="{{$ponencia->pititulo}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nombre del evento</label>
                                        <input type="text" class="form-control" name="pievento" id="pievento" value="{{$ponencia->pievento}}">
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
                                            <input type="text" class="form-control" name="pifecini" value="{{$ponencia->pifecini}}">
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
                                            <input type="text" class="form-control" name="pifecfin" value="{{$ponencia->pifecfin}}">
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
                                            <input type="text" class="form-control" name="pifecpon" value="{{$ponencia->pifecpon}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Ciudad</label>
                                        <input type="text" class="form-control" name="piciudad" id="pititulo" value="{{$ponencia->piciudad}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Página web del evento</label>
                                        <input type="text" class="form-control" name="pipagweb" id="pititulo" value="{{$ponencia->pipagweb}}" placeholder="http://www.evento.com">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Ámbito</label>
                                        <select class="custom-select form-control" name="piambito" id="piambito">
                                            <option selected value="">{{__('seleccione')}}</option>
                                            <option value="Local" {{ $ponencia->piambito == "Local" ? 'selected' : '' }}>Local</option>
                                            <option value="Nacional" {{ $ponencia->piambito == "Nacional" ? 'selected' : '' }}>Nacional</option>
                                            <option value="Internacional" {{ $ponencia->piambito == "Internacional" ? 'selected' : '' }}>Internacional</option>
                                        </select>
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
