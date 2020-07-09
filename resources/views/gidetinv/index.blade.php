@extends('layouts.app', ['activePage' => 'gidetinv', 'titlePage' => __('Asociar investigador a proyecto')])

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
                          <h4 class="card-title ">{{ __('gidetinv') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Proyecto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{$proyecto->pinompro}}
                                    </tbody>
                                </table>
                                <div class="row">
                                    <a href="{{route('giinvest.create')}} "><button class="btn btn-primary">Crear investigador</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
