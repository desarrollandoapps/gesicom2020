@extends('layouts.app', ['activePage' => 'gisemill', 'titlePage' => __('Detalle del Semillero')])
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
                            <h3 class="card-title">Detalle de {{ __('gisemill') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Código: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$semillero->seidsemi}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Grupo de investigación: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$semillero->grupo}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Nombre de {{ __('gisemill') }}: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$semillero->senombre}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Enlace a carpeta de semillero: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">
                                        <a href="{{$semillero->seenldoc}}" target="_blank">
                                            {{$semillero->seenldoc}}
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <a href="{{route('gisemill.index')}}"><button class="btn btn-primary">Regresar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection