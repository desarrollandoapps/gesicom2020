@extends('layouts.app', ['activePage' => 'giponinv', 'titlePage' => __('Detalle de ponencia')])
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
                            <h3 class="card-title">Detalle de {{ __('giponinv') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Título de la ponencia:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$ponencia->pititulo}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Evento:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$ponencia->pievento}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Fecha de inicio del evento:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{date_format(date_create($ponencia->pifecini), 'd/m/Y')}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Fecha de finalización del evento:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{date_format(date_create($ponencia->pifecfin), 'd/m/Y')}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Fecha de presentación:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{date_format(date_create($ponencia->pifecpon), 'd/m/Y')}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Ciudad:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$ponencia->piciudad}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Ámbito:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$ponencia->piambito}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Página web del evento:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$ponencia->pipagweb}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Proyecto vinculado:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$ponencia->proyecto}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Línea de investigación vinculada:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$ponencia->linea}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Tipo de ponencia:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$ponencia->tipo}}</h5>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <a href="{{route('giponinv.index')}}"><button class="btn btn-primary">Regresar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection