@extends('layouts.app', ['activePage' => 'gilinpro', 'titlePage' => __('Detalle de Línea Programática')])
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
                            <h3 class="card-title">Detalle de {{ __('gilinpro') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Nombre de {{ __('gilinpro') }}: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$linea->lpnomlin}}</h5>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <a href="{{route('gilinpro.index')}}"><button class="btn btn-primary">Regresar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection