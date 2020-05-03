@extends( 'layouts.app' )

@section( 'titulo' )
    Modificar Grupo de Investigación 
@endsection

@section('searchHidden')
    hidden
@endsection

@section('content')
<h1>Modificar Grupo de Investigación</h1>
<br>
@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $item)
                <li> {{$item}} </li>
            @endforeach
        </ul>    
    </div>
@endif
<br>
<form action="{{route('gigruinv.update', $grupo->id)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Código Colciencias</label>
        <input type="text" class="form-control" name="gicodgru" value="{{$grupo->gicodgru}}">
    </div>

    <div class="form-group">
        <label>Región Plan Nacional de Desarrollo</label>
        <input type="text" class="form-control" name="giregpnd" value="{{$grupo->giregpnd}}">
    </div>

    <div class="form-group">
        <label>Regional</label>
        <input type="text" class="form-control" name="giregion" value="{{$grupo->giregion}}">
    </div>


    <div class="form-group">
        <label>Centro de Formación</label>
        <input type="text" class="form-control" name="gicenfor" value="{{$grupo->gicenfor}}">
    </div>


    <div class="form-group">
        <label>Nombre del Grupo</label>
        <input type="text" class="form-control" name="ginombre" value="{{$grupo->ginombre}}">
    </div>


    <div class="form-group">
        <label>Mes de Creación</label>
        <select name="gimescre" class="form-control">
            <option value="" disabled>Seleccione un mes</option>
            <option value="Enero">Enero</option>
            <option value="Febrero">Febrero</option>
            <option value="Marzo">Marzo</option>
            <option value="Abril">Abril</option>
            <option value="Mayo">Mayo</option>
            <option value="Junio">Junio</option>
            <option value="Julio">Julio</option>
            <option value="Agosto">Agosto</option>
            <option value="Septiembre">Septiembre</option>
            <option value="Octubre">Octubre</option>
            <option value="Noviembre">Noviembre</option>
            <option value="Diciembre">Diciembre</option>
        </select>
    </div>


    <div class="form-group">
        <label>Año de Creación</label>
        <input type="number" class="form-control" name="gianocre" value="{{$grupo->gianocre}}">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>


@endsection
