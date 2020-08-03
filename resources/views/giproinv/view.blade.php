@extends('layouts.app', ['activePage' => 'giproinv', 'titlePage' => __('Detalle de Proyecto')])
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
                            <h3 class="card-title">Detalle de {{ __('giproinv') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Nombre de {{ __('giproinv') }}: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$proyecto->pinompro}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Regional: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$proyecto->regional}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Centro de formación: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$proyecto->centro}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Grupo de investigación: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$proyecto->grupo}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Año de formulación: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$proyecto->pianofor}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Número de radicado: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$proyecto->pinumrad}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Valor presupuestado: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">$ {{number_format($proyecto->pivalpre, 0, ',', '.')}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Año de ejecución: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$proyecto->pianoeje}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Línea programática: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">{{$proyecto->linea}}</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <h5>Investigadores asociados: </h5>
                            </div>
                            <div class="row">
                                <ul>
                                    @foreach ($investigadores as $item)
                                        <li>{{$item->innombre}} <a href="{{route('giinvest.show', $item->id)}}">&nbsp&nbsp&nbsp&nbsp<i class="fas fa-eye"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <hr>
                            <div class="row">
                                <h5>Artículos asociados: </h5>
                            </div>
                            <div class="row">
                                <ul>
                                    @foreach ($articulos as $item)
                                        <li>{{$item->aititulo}} <a href="{{route('giartinv.show', $item->id)}}">&nbsp&nbsp&nbsp&nbsp<i class="fas fa-eye"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <hr>
                            <div class="row">
                                <h5>Libros asociados: </h5>
                            </div>
                            <div class="row">
                                <ul>
                                    @foreach ($libros as $item)
                                        <li>{{$item->linomlib}} <a href="{{route('gilibinv.show', $item->id)}}">&nbsp&nbsp&nbsp&nbsp<i class="fas fa-eye"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <hr>
                            <div class="row">
                                <h5>Patentes asociadas: </h5>
                            </div>
                            <div class="row">
                                <ul>
                                    @foreach ($patentes as $item)
                                        <li>{{$item->pititobr}} <a href="{{route('gipatinv.show', $item->id)}}">&nbsp&nbsp&nbsp&nbsp<i class="fas fa-eye"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <hr>
                            <div class="row">
                                <h5>Ponencias asociadas: </h5>
                            </div>
                            <div class="row">
                                <ul>
                                    @foreach ($ponencias as $item)
                                        <li>{{$item->pititulo}} <a href="{{route('giponinv.show', $item->id)}}">&nbsp&nbsp&nbsp&nbsp<i class="fas fa-eye"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <hr>
                            <div class="row">
                                <h5>Software asociado: </h5>
                            </div>
                            <div class="row">
                                <ul>
                                    @foreach ($software as $item)
                                        <li>{{$item->sititobr}} <a href="{{route('gisofinv.show', $item->id)}}">&nbsp&nbsp&nbsp&nbsp<i class="fas fa-eye"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <br>
                            <div class="row">
                                <a href="{{route('giproinv.index')}}"><button class="btn btn-primary">Regresar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#piinvest').change(function(event) {            
            $investigador = event.target.value;
        });
    </script>
@endsection