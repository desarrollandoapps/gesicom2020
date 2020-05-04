@extends('layouts.app', ['activePage' => 'gigruinv', 'titlePage' => __('Detalle del Grupo de Investigación')])
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
                            <h4 class="card-title">Detalle del Grupo de Investigación</h4>
                            <h4 class="card-title">{{$grupo->ginombre}}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <h3 class="title">Región Plan Nacional de Desarrollo: <h3>
                                </div>
                                <div class="col-md-5">
                                    <h3>{{$grupo->giregpnd}}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h3 class="title">Regional: </h3>
                                </div>
                                <div class="col-sm-5">
                                    <h3>{{$grupo->giregion}}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h3 class="title">Centro de Formación: </h3>
                                </div>
                                <div class="col-sm-5">
                                    <h3>{{$grupo->gicenfor}}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h3 class="title">Nombre del Grupo de Investigación: </h3>
                                </div>
                                <div class="col-sm-5">
                                    <h3>{{$grupo->ginombre}}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h3 class="title">Código Colciencias: </h3>
                                </div>
                                <div class="col-sm-5">
                                    <h3>{{$grupo->gicodgru}}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h3 class="title">Mes de creación: </h3>
                                </div>
                                <div class="col-sm-5">
                                    <h3>{{$grupo->gimescre}}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h3 class="title">Año de creación: </h3>
                                </div>
                                <div class="col-sm-5">
                                    <h3>{{$grupo->gianocre}}</h3>
                                </div>
                            </div>
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