@extends('layouts.app', ['activePage' => 'gilinpro', 'titlePage' => __('Crear Línea de investigación')])

@section('hidden-search')
    hidden
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Creación de {{__('gilininv')}} </h4>
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
                            <form action="{{route('gilininv.store')}} " method="POST">
                                @csrf
                                @method('POST')
                                
                                <div class="form-group">
                                    <label>Grupo de investigación</label>
                                    {!! Form::select('licodgru', $grupos, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'licodgru']) !!}
                                </div>
                                <div class="form-group">
                                    <label>Nombre de la línea</label>
                                    <input type="text" class="form-control" name="lideslin" value="{{old('lideslin')}}">
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