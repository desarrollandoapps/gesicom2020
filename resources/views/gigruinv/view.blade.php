@extends('layouts.app', ['activePage' => 'gigruinv', 'titlePage' => __('Detalle del Grupo de Investigación')])
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
                            <h4 class="card-title">Detalle del Grupo de Investigación</h4>
                            <h4 class="card-title">{{$grupo->ginombre}}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Región Plan Nacional de Desarrollo: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$grupo->giregpnd}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h5>Regional: </h5>
                                </div>
                                <div class="col-sm-5">
                                    <h5 class="lead">{{$grupo->regional}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h5>Centro de Formación: </h5>
                                </div>
                                <div class="col-sm-5">
                                    <h5 class="lead">{{$grupo->centro}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h5>Nombre del Grupo de Investigación: </h5>
                                </div>
                                <div class="col-sm-5">
                                    <h5 class="lead">{{$grupo->ginombre}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h5>Código Colciencias: </h5>
                                </div>
                                <div class="col-sm-5">
                                    <h5 class="lead">{{$grupo->gicodgru}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h5>Mes de creación: </h5>
                                </div>
                                <div class="col-sm-5">
                                    <h5 class="lead">{{$grupo->gimescre}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h5>Año de creación: </h5>
                                </div>
                                <div class="col-sm-5">
                                    <h5 class="lead">{{$grupo->gianocre}}</h5>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <a href="{{route('gigruinv.index')}}"><button class="btn btn-primary">Regresar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection