@extends('layouts.app', ['activePage' => 'gilibinv', 'titlePage' => __('Detalle de libro')])
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
                            <h3 class="card-title">Detalle de {{ __('gilibinv') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Nombre del libro:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$libro->linomlib}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Número de páginas:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$libro->linumpag}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Año de publicación:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$libro->lianopub}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Mes de publicación:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$libro->limespub}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Día de publicación:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$libro->lidiapub}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Editorial:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$libro->lieditor}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Ciudad de publicación:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$libro->liciupub}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Medio de divulgación:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$libro->limeddiv}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Código ISBN:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$libro->licoisbn}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Página web del libro:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$libro->lisitweb}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Proyecto vinculado:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$libro->proyecto}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Tipo de libro:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$libro->tipo}}</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h5>Autores: </h5>
                            </div>
                            <div class="row">
                                <ul>
                                    @foreach ($autores as $item)
                                        <li>{{$item->innombre}} <a href="{{route('giinvest.show', $item->id)}}">&nbsp&nbsp&nbsp&nbsp<i class="fas fa-eye"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <br>
                            <div class="row">
                                <a href="{{route('gilibinv.index')}}"><button class="btn btn-primary">Regresar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
