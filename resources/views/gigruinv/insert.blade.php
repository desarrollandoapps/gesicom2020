@extends('layouts.app', ['activePage' => 'gigruinv', 'titlePage' => __('Crear Grupo de Investigación')])

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
                            <h4 class="card-title">Creación de Grupo de Investigación</h4>
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
                            <form action="{{route('gigruinv.store')}} " method="POST">
                                @csrf
                                @method('POST')
                        
                                <div class="form-group">
                                    <label>Código Colciencias</label>
                                    <input type="text" class="form-control" name="gicodgru" value="{{old('gicodgru')}}">
                                </div>
                        
                                <div class="form-group">
                                    <label>Región Plan Nacional de Desarrollo</label>
                                    <input type="text" class="form-control" name="giregpnd" value="{{old('giregpnd')}}">
                                </div>
                        
                                <div class="form-group">
                                    <label>Regional</label>
                                    <input type="text" class="form-control" name="giregion" value="{{old('giregion')}}">
                                </div>
                        
                                <div class="form-group">
                                    <label>Centro de Formación</label>
                                    <input type="text" class="form-control" name="gicenfor" value="{{old('gicenfor')}}">
                                </div>
                        
                                <div class="form-group">
                                    <label>Nombre del Grupo</label>
                                    <input type="text" class="form-control" name="ginombre" value="{{old('ginombre')}}">
                                </div>
                        
                                <div class="form-group">
                                    <label>Mes de Creación</label>
                                    <select name="gimescre" class="form-control">
                                        <option value="" disabled>Seleccione un mes</option>
                                        <option value="Enero" {{ old('gimescre') == "Enero" ? 'selected' : '' }}>Enero</option>
                                        <option value="Febrero" {{ old('gimescre') == "Febrero" ? 'selected' : '' }}>Febrero</option>
                                        <option value="Marzo" {{ old('gimescre') == "Marzo" ? 'selected' : '' }}>Marzo</option>
                                        <option value="Abril" {{ old('gimescre') == "Abril" ? 'selected' : '' }}>Abril</option>
                                        <option value="Mayo" {{ old('gimescre') == "Mayo" ? 'selected' : '' }}>Mayo</option>
                                        <option value="Junio" {{ old('gimescre') == "Junio" ? 'selected' : '' }}>Junio</option>
                                        <option value="Julio" {{ old('gimescre') == "Julio" ? 'selected' : '' }}>Julio</option>
                                        <option value="Agosto" {{ old('gimescre') == "Agosto" ? 'selected' : '' }}>Agosto</option>
                                        <option value="Septiembre" {{ old('gimescre') == "Septiembre" ? 'selected' : '' }}>Septiembre</option>
                                        <option value="Octubre" {{ old('gimescre') == "Octubre" ? 'selected' : '' }}>Octubre</option>
                                        <option value="Noviembre" {{ old('gimescre') == "Noviembre" ? 'selected' : '' }}>Noviembre</option>
                                        <option value="Diciembre" {{ old('gimescre') == "Diciembre" ? 'selected' : '' }}>Diciembre</option>
                                    </select>
                                </div>
                        
                                <div class="form-group">
                                    <label>Año de Creación</label>
                                    <input type="number" class="form-control" name="gianocre" value="{{old('gianocre')}}">
                                </div>
                        
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    

@endsection