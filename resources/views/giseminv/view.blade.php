@extends('layouts.app', ['activePage' => 'giseminv', 'titlePage' => __('Detalle de Integrante de Semillero')])
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
                            <h4 class="card-title">Detalle de Integrante de Semillero</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5>Nombre:<h5>
                                </div>
                                <div class="col-sm-3">
                                    <h5 class="lead">{{$semillero->sinombre}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Tipo de documento:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead text-uppercase">{{$semillero->sitipdoc}}</h5>
                                </div>
                                <div class="col">
                                    <h5>Número de documento:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$semillero->sinumdoc}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Fecha de expedición:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead text-uppercase">{{ date_format(date_create($semillero->sifecexp), 'd/m/Y') }}</h5>
                                </div>
                                <div class="col">
                                    <h5>Municipio de expedición:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$semillero->simunexp}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5>Fecha de Nacimiento:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead text-uppercase">{{ date_format(date_create($semillero->sifecnac), 'd/m/Y') }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Correo personal:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$semillero->sicorper}}</h5>
                                </div>
                                <div class="col">
                                    <h5>Correo SENA o MiSENA:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$semillero->sicorsen}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Rol SENNOVA:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$semillero->sirolsen}}</h5>
                                </div>
                                <div class="col">
                                    <h5>Tipo de vinculación:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$semillero->sitipvin}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Último grado de formación recibido:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$semillero->sigrafor}}</h5>
                                </div>
                                <div class="col">
                                    <h5>Nombre del último titulo obtenido:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$semillero->sititulo}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Profesión:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$semillero->siprofes}}</h5>
                                </div>
                                <div class="col">
                                    <h5>Nivel de inglés:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$semillero->siniving}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Teléfono celular:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$semillero->sinumcel}}</h5>
                                </div>
                                <div class="col">
                                    <h5>Teléfono fijo:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$semillero->sitelfij}}</h5>
                                </div>
                                <div class="col">
                                    <h5>Número de IP:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$semillero->sinumeip}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Titulación:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$semillero->sititula}}</h5>
                                </div>
                                <div class="col">
                                    <h5>Número de ficha:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$semillero->sinumfic}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5>Instructor:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{$semillero->siinstru}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Fecha de terminación de etapa lectiva:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ date_format(date_create($semillero->siterlec), 'd/m/Y') }}</h5>
                                </div>
                                <div class="col">
                                    <h5>Fecha de terminación de etapa productiva:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ date_format(date_create($semillero->siterpro), 'd/m/Y') }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Antigüedad en el SENA en meses:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $semillero->siantsen }}</h5>
                                </div>
                                <div class="col">
                                    <h5>Área de conocimiento en que se desempeña:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $semillero->siarecon }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Grupo de investigación vinculado:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $semillero->nombreGrupo }}</h5>
                                </div>
                                <div class="col">
                                    <h5>Semillero de investigación vinculado:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $semillero->nombreSemillero }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Proyecto vinculado:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $semillero->nombreProyecto }}</h5>
                                </div>
                                <div class="col">
                                    <h5>Vinculación a un proyecto RedColSI:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $semillero->siprored }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Participación RedColSI:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $semillero->siparred }}</h5>
                                </div>
                                <div class="col">
                                    <h5>Formulación de proyecto:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $semillero->siforpro }}</h5>
                                </div>
                                <div class="col">
                                    <h5>Curso de Investigación a realizar:<h5>
                                </div>
                                <div class="col">
                                    <h5 class="lead">{{ $semillero->sicurinv }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <h5>Capacitaciones realizadas:<h5><br>
                                    @foreach ($capacitaciones as $item)
                                        <ul>
                                            @foreach ($capaSemillero as $item2)
                                                @if ($item2->dccapaci == $item->id)
                                                    <li>{{$item->csnombre}}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endforeach
                            </div>


                            <br>
                            <div class="row">
                                <a href="{{route('giseminv.index')}}"><button class="btn btn-primary">Regresar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection