@extends('layouts.app', ['activePage' => 'giinvest', 'titlePage' => __('Detalle de Investigador')])
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
                            <h4 class="card-title">Detalle de Investigador</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5>Nombre:<h5>
                                </div>
                                <div class="col-sm-3">
                                    <h5 class="lead">{{$investigador->innombre}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Tipo de documento:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead text-uppercase">{{$investigador->intipdoc}}</h5>
                                </div>
                                <div class="col">
                                    <h5>Número de documento:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{number_format($investigador->innumdoc, 0, ',', '.')}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Fecha de expedición:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead text-uppercase">{{ date_format(date_create($investigador->infecexp), 'd/m/Y') }}</h5>
                                </div>
                                <div class="col">
                                    <h5>Municipio de expedición:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$investigador->inmunexp}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5>Fecha de Nacimiento:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead text-uppercase">{{ date_format(date_create($investigador->infecnac), 'd/m/Y') }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Correo personal:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$investigador->incorper}}</h5>
                                </div>
                                <div class="col">
                                    <h5>Correo SENA:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$investigador->incorsen}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Teléfono celular:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$investigador->innumcel}}</h5>
                                </div>
                                <div class="col">
                                    <h5>Teléfono fijo:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$investigador->intelfij}}</h5>
                                </div>
                                <div class="col">
                                    <h5>Número de IP:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$investigador->innumeip}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Último grado de formación recibo:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$investigador->ingrafor}}</h5>
                                </div>
                                <div class="col">
                                    <h5>Nombre del último titulo obtenido:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$investigador->intitulo}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Profesión:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$investigador->inprofes}}</h5>
                                </div>
                                <div class="col">
                                    <h5>Nivel de inglés:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$investigador->inniving}}</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <h5>Regional:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $investigador->regional }}</h5>
                                </div>
                                <div class="col">
                                    <h5>Centro de formación:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $investigador->centro }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Grupo de investigación:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $investigador->grupo }}</h5>
                                </div>
                                <div class="col">
                                    <h5>Semillero de investigación:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $investigador->semillero }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Línea de investigación:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $investigador->linea }}</h5>
                                </div>
                                <div class="col">
                                    <h5>Rol SENNOVA:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $rol }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Tipo de vinculación:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $vinculacion }}</h5>
                                </div>
                                <div class="col">
                                    <h5>Grado:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $grado }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Antigüedad en el SENA en meses:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $investigador->inantsen }}</h5>
                                </div>
                                <div class="col">
                                    <h5>Área de conocimiento en que se desempeña:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $investigador->inarecon }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Porcentaje de dedicación:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $investigador->inporded }} %</h5>
                                </div>
                                <div class="col">
                                    <h5>Programa de formación:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $investigador->inprofor }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Asignación salarial mensual:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">$ {{ number_format($investigador->inasimen, 0, ',', '.') }}</h5>
                                </div>
                                <div class="col">
                                    <h5>Número de contrato:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $investigador->innumcon }}</h5>
                                </div>
                                <div class="col">
                                    <h5>¿Está contratado?:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $investigador->inestcon }}</h5>
                                </div>
                            </div>


                            <br>
                            <div class="row">
                                <a href="{{route('giinvest.index')}}"><button class="btn btn-primary">Regresar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection