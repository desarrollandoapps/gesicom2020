@extends('layouts.app', ['activePage' => 'gilininv', 'titlePage' => __('Detalle de Línea de investigación')])
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
                            <h3 class="card-title">Detalle de {{ __('gilininv') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Nombre de {{ __('gilininv') }}: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$linea->lideslin}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>{{ __('gigruinv') }}: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$linea->grupo}}</h5>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <a href="{{route('gilininv.index')}}"><button class="btn btn-primary">Regresar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection