@extends('layouts.app', ['activePage' => 'gipatinv', 'titlePage' => __('Detalle de Patente')])
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
                            <h3 class="card-title">Detalle de {{ __('gipatinv') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Número de radicado:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$patente->pinumrad}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Fecha de solicitud:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$patente->pifecsol}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Título de la obra:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$patente->pititobr}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Número de registro:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$patente->pinumreg}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Proyecto vinculado:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$patente->proyecto}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Tipo de patente:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$patente->tipo}}</h5>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <a href="{{route('gipatinv.index')}}"><button class="btn btn-primary">Regresar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
