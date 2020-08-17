@extends('layouts.app', ['activePage' => 'giproinv', 'titlePage' => __('Proyectos de investigación')])

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
                          <h4 class="card-title ">{{ __('giproinv') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th class="text-right">Opciones</th>
                                            <th class="text-right"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($proyectos as $item)
                                            <tr>
                                                <td> {{$item->pinompro}}</td>
                                                <td class="td-actions text-right">
                                                    <a href="{{route('giproinv.show', $item->id)}}"><button type="button" rel="tooltip" class="btn btn-info btn-circle"><i class="fas fa-eye"></i></button></a>
                                                    <a href="{{route('giproinv.edit', $item->id)}}"><button type="button" rel="tooltip" class="btn btn-success btn-circle"><i class="fas fa-edit"></i></button></a>
                                                    <form action="{{route('giproinv.destroy', $item->id)}}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" rel="tooltip" class="btn btn-danger btn-circle" onclick="return confirm('¿Confirma la eliminación de la capacitación?')"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                                <td class="td-actions text-right">
                                                    <form action="{{route('gidetinv.create')}}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('GET')
                                                        <input type="hidden" name="diproinv" value="{{$item->id}}">
                                                        <button type="submit" class="btn btn-light btn-circle" data-toggle="tooltip" data-placement="top" title="Asociar investigadores"><i class="fas fa-user-plus"></i></button>
                                                    </form>
                                                    <form action="{{route('giproesp.create')}}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('GET')
                                                        <input type="hidden" name="dpproinv" value="{{$item->id}}">
                                                        <button type="submit" class="btn btn-light btn-circle" data-toggle="tooltip" data-placement="top" title="Asociar productos esperados"><i class="fas fa-book-reader"></i></button>
                                                    </form>
                                                    <form action="{{route('gidepres.create')}}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('GET')
                                                        <input type="hidden" name="dpproinv" value="{{$item->id}}">
                                                        <button type="submit" class="btn btn-light btn-circle" data-toggle="tooltip" data-placement="top" title="Crear seguimiento"><i class="fas fa-calendar-plus"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <a href="{{route('giproinv.create')}} "><button class="btn btn-primary">Crear {{ __('giproinv') }}</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
@endsection
