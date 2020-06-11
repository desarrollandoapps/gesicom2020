@extends('layouts.app', ['activePage' => 'giinvest', 'titlePage' => __('giinvest')])

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
                          <h4 class="card-title ">{{__('giinvest')}}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Regional</th>
                                            <th>Centro de Formación</th>
                                            <th>Grupo de investigación</th>
                                            <th class="text-right">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($investigadores as $item)
                                            <tr>
                                                <td> {{$item->innombre}} </td>
                                                <td> {{$item->regional}} </td>
                                                <td> {{$item->centro}} </td>
                                                <td> {{$item->grupo}} </td>
                                                <td class="td-actions text-right">
                                                    <a href="{{route('giinvest.show', $item->id)}}"><button type="button" rel="tooltip" class="btn btn-info btn-circle"><i class="fas fa-eye"></i></button></a>
                                                    <a href="{{route('giinvest.edit', $item->id)}}"><button type="button" rel="tooltip" class="btn btn-success btn-circle"><i class="fas fa-edit"></i></button></a>
                                                    <form action="{{route('giinvest.destroy', $item->id)}}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" rel="tooltip" class="btn btn-danger btn-circle" onclick="return confirm('¿Confirma la eliminación del investigador?')"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <a href="{{route('giinvest.create')}} "><button class="btn btn-primary">Crear {{__('giinvest')}}</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
