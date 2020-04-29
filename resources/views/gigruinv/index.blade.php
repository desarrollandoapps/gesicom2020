@extends('layouts.layout')
@section('titulo')
    Grupos de Investigación
@endsection

@section('contenido')
    <h1>Grupos de Investigación</h1>
    <br>

    @if ( $mensaje = Session::get( 'exito' ) ) 
        <div class="alert alert-success" role="alert">
            {{$mensaje}}
        </div>
    @endif

    <br>

    <table class="table table-hover">
        <thead>
            <tr>
              <th scope="col">Código</th>
              <th scope="col">Nombre</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($grupos as $item)
                  <tr>
                      <td> {{$item->gicodgru}} </td>
                      <td> {{$item->ginombre}} </td>
                      <td>  
                          <form action="{{route('gigruinv.destroy', $item->id)}}" method="POST">
                          <a href="{{route('gigruinv.show', $item->id)}}" class="btn btn-info">Ver</a>
                          <a href="{{route('gigruinv.edit', $item->id)}}" class="btn btn-warning">Editar</a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Eliminar</button>
                          </form>
                      </td>
                  </tr>
              @endforeach
          </tbody>
    </table>

    <br>

    <div class="row">
        <a href="{{route('gigruinv.create')}} "><button class="btn btn-primary">Crear Grupo de Investigación</button></a>
    </div>
@endsection
