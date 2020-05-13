@extends('layouts.app', ['activePage' => 'gigruinv', 'titlePage' => __('Modificar Grupo de Investigación')])

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
                        <h4 class="card-title">Modificar de Grupo de Investigación</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                        <li> {{$item}} </li>
                                    @endforeach
                                </ul>    
                            </div>
                            <br>
                        @endif
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
                                <select name="gimescre" class="custom-select form-control">
                                    <option value="" disabled>Seleccione un mes</option>
                                    <option value="Enero" {{ ($grupo->gimescre) == "Enero" ? 'selected' : '' }}>Enero</option>
                                        <option value="Febrero" {{ ($grupo->gimescre) == "Febrero" ? 'selected' : '' }}>Febrero</option>
                                        <option value="Marzo" {{ ($grupo->gimescre) == "Marzo" ? 'selected' : '' }}>Marzo</option>
                                        <option value="Abril" {{ ($grupo->gimescre) == "Abril" ? 'selected' : '' }}>Abril</option>
                                        <option value="Mayo" {{ ($grupo->gimescre) == "Mayo" ? 'selected' : '' }}>Mayo</option>
                                        <option value="Junio" {{ ($grupo->gimescre) == "Junio" ? 'selected' : '' }}>Junio</option>
                                        <option value="Julio" {{ ($grupo->gimescre) == "Julio" ? 'selected' : '' }}>Julio</option>
                                        <option value="Agosto" {{ ($grupo->gimescre) == "Agosto" ? 'selected' : '' }}>Agosto</option>
                                        <option value="Septiembre" {{ ($grupo->gimescre) == "Septiembre" ? 'selected' : '' }}>Septiembre</option>
                                        <option value="Octubre" {{ ($grupo->gimescre) == "Octubre" ? 'selected' : '' }}>Octubre</option>
                                        <option value="Noviembre" {{ ($grupo->gimescre) == "Noviembre" ? 'selected' : '' }}>Noviembre</option>
                                        <option value="Diciembre" {{ ($grupo->gimescre) == "Diciembre" ? 'selected' : '' }}>Diciembre</option>
                                </select>
                            </div>
                        
                        
                            <div class="form-group">
                                <label>Año de Creación</label>
                                <input type="number" class="form-control" name="gianocre" value="{{$grupo->gianocre}}">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection