@extends('layouts.app', ['activePage' => 'gipatinv', 'titlePage' => __('Patentes')])

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
                          <h4 class="card-title ">{{ __('gipatinv') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Título de la Obra</th>
                                            <th class="text-right">Opciones</th>
                                            <th class="text-right"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($patentes as $item)
                                            <tr>
                                                <td> {{$item->pititobr}}</td>
                                                <td class="td-actions text-right">
                                                    <a href="{{route('gipatinv.show', $item->id)}}"><button type="button" rel="tooltip" class="btn btn-info btn-circle"><i class="fas fa-eye"></i></button></a>
                                                    <a href="{{route('gipatinv.edit', $item->id)}}"><button type="button" rel="tooltip" class="btn btn-success btn-circle"><i class="fas fa-edit"></i></button></a>
                                                    <form action="{{route('gipatinv.destroy', $item->id)}}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" rel="tooltip" class="btn btn-danger btn-circle" onclick="return confirm('¿Confirma la eliminación de la patente?')"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                                <td class="td-actions text-right">
                                                    <form action="{{route('gidepaau.create')}}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('GET')
                                                        <input type="hidden" name="dppatinv" value="{{$item->id}}">
                                                        <button type="submit" class="btn btn-light btn-circle" data-toggle="tooltip" data-placement="top" title="Asociar autores"><i class="fas fa-user-plus"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <a href="{{route('gipatinv.create')}} "><button class="btn btn-primary">Crear {{ __('gipatinv') }}</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
