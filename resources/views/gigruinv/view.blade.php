@extends( 'layouts.app' )

@section( 'titulo' )
    Detalle del Grupo de Investigación 
@endsection

@section('searchHidden')
    hidden
@endsection

@section('content')
    <h1 class="text-center">Detalle del Grupo de Investigación</h1>

    <br><br>

    <div class="row">
        <div class="col-sm-5">
            <h4>Región Plan Nacional de Desarrollo: </h4>
        </div>

        <div class="col-sm-5">
            <p class="lead">{{$grupo->giregpnd}}</h4>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-sm-5">
            <h4>Regional: </h4>
        </div>

        <div class="col-sm-5">
            <p class="lead">{{$grupo->giregion}}</h4>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-sm-5">
            <h4>Centro de Formación: </h4>
        </div>

        <div class="col-sm-5">
            <p class="lead">{{$grupo->gicenfor}}</h4>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-sm-5">
            <h4>Nombre del Grupo de Investigación: </h4>
        </div>

        <div class="col-sm-5">
            <p class="lead">{{$grupo->ginombre}}</h4>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-sm-5">
            <h4>Mes de creación: </h4>
        </div>

        <div class="col-sm-5">
            <p class="lead">{{$grupo->gimescre}}</h4>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-sm-5">
            <h4>Año de creación: </h4>
        </div>

        <div class="col-sm-5">
            <p class="lead">{{$grupo->gianocre}}</h4>
        </div>
    </div>

    <br>
    
    <div class="row">
        <div class="col-sm-5">
            <h4>Código Colciencias: </h4>
        </div>

        <div class="col-sm-5">
            <p class="lead">{{$grupo->gicodgru}}</h4>
        </div>
    </div>

    <br><br>

    <div class="row">
        <a href="{{route('gigruinv.index')}}"><button class="btn btn-primary">Regresar</button></a>
    </div>

@endsection