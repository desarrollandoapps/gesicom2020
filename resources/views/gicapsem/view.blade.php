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
                            <h3 class="card-title">Detalle de {{ __('gicapsem') }}</h3>
                            <h3 class="card-title">{{$capacitacion->csnombre}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Nombre de {{ __('gicapsem') }}: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$capacitacion->csnombre}}</h5>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <a href="{{route('gicapsem.index')}}"><button class="btn btn-primary">Regresar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection