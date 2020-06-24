@extends('layouts.app', ['activePage' => 'gisofinv', 'titlePage' => __('Detalle de Software')])
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
                            <h3 class="card-title">Detalle de {{ __('gisofinv') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Regional:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$software->regional}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Centro de formación:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$software->centro}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Grupo de investigación:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$software->grupo}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Título de la obra:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$software->sititobr}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Número de radicado:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$software->sinumrad}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Fecha de solicitud:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{date_format(date_create($software->pifecrad), 'd/m/Y')}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Estado del trámite:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$software->siesttra}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Número de registro:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$software->sinumreg}}</h5>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <a href="{{route('gisofinv.index')}}"><button class="btn btn-primary">Regresar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection