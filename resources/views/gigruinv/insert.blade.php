@extends('layouts.layout')

@section('titulo')
    Crear Grupo de Investigación
@endsection

@section('contenido')
    <h1>Crear Grupo de Investigación</h1>
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
    <form action="{{route('gigruinv.store')}} " method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
            <label>Código Colciencias</label>
            <input type="text" class="form-control" name="gicodgru">
        </div>

        <div class="form-group">
            <label>Región Plan Nacional de Desarrollo</label>
            <input type="text" class="form-control" name="giregpnd">
        </div>

        <div class="form-group">
            <label>Regional</label>
            <input type="text" class="form-control" name="giregion">
        </div>


        <div class="form-group">
            <label>Centro de Formación</label>
            <input type="text" class="form-control" name="gicenfor">
        </div>


        <div class="form-group">
            <label>Nombre del Grupo</label>
            <input type="text" class="form-control" name="ginombre">
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
            <input type="number" class="form-control" name="gianocre">
        </div>

        <button type="submit">Guardar</button>

    </form>
    

@endsection