@extends('layouts.app', ['activePage' => 'gigruinv', 'titlePage' => __('Grupos de Investigación')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if ( $mensaje = Session::get( 'exito' ) ) 
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{$mensaje}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header card-header-primary">
                          <h4 class="card-title ">Grupos de Investigación</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th class="text-right">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($grupos as $item)
                                            <tr>
                                                <td> {{$item->gicodgru}} </td>
                                                <td> {{$item->ginombre}} </td>
                                                <td class="td-actions text-right">
                                                    <a href="{{route('gigruinv.show', $item->id)}}"><button type="button" rel="tooltip" class="btn btn-info btn-simple"><i class="material-icons">remove_red_eye</i></button></a>
                                                    <a href="{{route('gigruinv.edit', $item->id)}}"><button type="button" rel="tooltip" class="btn btn-success btn-simple"><i class="material-icons">edit</i></button></a>
                                                    <form action="{{route('gigruinv.destroy', $item->id)}}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" rel="tooltip" class="btn btn-danger btn-simple" onclick="return confirm('¿Confirma la eliminación del grupo?')"><i class="material-icons">close</i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <a href="{{route('gigruinv.create')}} "><button class="btn btn-primary">Crear Grupo de Investigación</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
