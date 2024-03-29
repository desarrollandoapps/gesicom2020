@extends('layouts.app', ['activePage' => 'girubpre', 'titlePage' => __('Detalle de Rubro Presupuestal')])
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
                            <h3 class="card-title">Detalle del {{ __('girubpre') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Descripción del {{ __('girubpre') }}: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$rubro->rpdesrub}}</h5>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <a href="{{route('girubpre.index')}}"><button class="btn btn-primary">Regresar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
