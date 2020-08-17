@extends('layouts.app', ['activePage' => 'giproinv', 'titlePage' => __('Detalle de Proyecto')])
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
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Enlace a carpeta del proyecto: </h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="lead">
                                        <a href="{{$proyecto->pienldri}}" target="_blank">{{$proyecto->pienldri}}</a>
                                    </h5>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-5">
                                    <h5>Investigadores asociados: </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <ul>
                                        @foreach ($investigadores as $item)
                                            <li>{{$item->innombre}} <a href="{{route('giinvest.show', $item->id)}}">&nbsp&nbsp&nbsp&nbsp<i class="fas fa-eye"></i></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @if ($productosEsperados != "[]")
                                <hr>
                                <div class="row">
                                    <div class="col-md-5">
                                        <h4 class="text-muted">Productos esperados: </h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <ul>
                                            @foreach ($productosEsperados as $item)
                                                <li>{{$item->pedespro}} - <span class="lead text-muted">{{$item->peporava}}%</span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            @if ($articulos != "[]" || $libros != "[]" || $patentes != "[]" || $ponencias != "[]" || $software != "[]")
                                <hr>
                                <h4 class="text-muted">Productos terminados</h4>
                            @endif
                            @if ($articulos != "[]")
                                <div class="row">
                                    <div class="col-md-5">
                                        <h5>Artículos: </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <ul>
                                            @foreach ($articulos as $item)
                                                <li>{{$item->aititulo}} <a href="{{route('giartinv.show', $item->id)}}">&nbsp&nbsp&nbsp&nbsp<i class="fas fa-eye"></i></a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            @if ($libros != "[]")
                                <div class="row">
                                    <div class="col-md-5">
                                        <h5>Libros: </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <ul>
                                            @foreach ($libros as $item)
                                                <li>{{$item->linomlib}} <a href="{{route('gilibinv.show', $item->id)}}">&nbsp&nbsp&nbsp&nbsp<i class="fas fa-eye"></i></a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            @if ($patentes != "[]")
                                <div class="row">
                                    <div class="col-md-5">
                                        <h5>Patentes: </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <ul>
                                            @foreach ($patentes as $item)
                                                <li>{{$item->pititobr}} <a href="{{route('gipatinv.show', $item->id)}}">&nbsp&nbsp&nbsp&nbsp<i class="fas fa-eye"></i></a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            @if ($ponencias != "[]")
                                <div class="row">
                                    <div class="col-md-5">
                                        <h5>Ponencias: </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <ul>
                                        <div class="col-md-5">
                                            @foreach ($ponencias as $item)
                                                <li>{{$item->pititulo}} <a href="{{route('giponinv.show', $item->id)}}">&nbsp&nbsp&nbsp&nbsp<i class="fas fa-eye"></i></a></li>
                                            @endforeach
                                        </div>
                                    </ul>
                                </div>
                            @endif
                            @if ($software != "[]")
                                <div class="row">
                                    <div class="col-md-5">
                                        <h5>Software: </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <ul>
                                            @foreach ($software as $item)
                                                <li>{{$item->sititobr}} <a href="{{route('gisofinv.show', $item->id)}}">&nbsp&nbsp&nbsp&nbsp<i class="fas fa-eye"></i></a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
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