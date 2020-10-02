@extends('layouts.app', ['activePage' => 'giartinv', 'titlePage' => __('Detalle de artículo')])
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
                            <h3 class="card-title">Detalle de {{ __('giartinv') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Título del artículo:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$articulo->aititulo}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Página inicial:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$articulo->aipagini}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Página final:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$articulo->aipagfin}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Año de publicación:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$articulo->aianopub}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Mes de publicación:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$articulo->aimespub}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Nombre de la revista:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$articulo->ainomrev}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Volumen de la revista:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$articulo->aivolrev}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Serie de la revista:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$articulo->aiserrev}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Ciudad de publicación:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$articulo->aiciupub}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Medio de divulgación:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$articulo->aimeddiv}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Código ISSN:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$articulo->aicoissn}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Código  DOI (Digital Object Identifier):</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">
                                        <a href="{{$articulo->aicoddoi}}" target="_blank">{{$articulo->aicoddoi}}</a>
                                    </h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Página web de la revista:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">
                                        <a href="{{$articulo->aisitweb}}" target="_blank">{{$articulo->aisitweb}}</a>
                                    </h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Proyecto vinculado:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$articulo->proyecto}}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Tipo de articulo:</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$articulo->tipo}}</h5>
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
                                <a href="{{route('giartinv.index')}}"><button class="btn btn-primary">Regresar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
