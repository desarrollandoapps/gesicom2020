@extends('layouts.app', ['activePage' => 'gilininv', 'titlePage' => __('Modificar Línea de investigación')])

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
                        <h4 class="card-title">Modificar {{__('gilininv')}}</h4>
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
                        <form action="{{route('gilininv.update', $linea->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                        
                            <div class="form-group">
                                <label>Grupo de investigación</label>
                                {!! Form::select('licodgru', $grupos, $linea->licodgru, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'licodgru']) !!}
                            </div>
                            <div class="form-group">
                                <label>Nombre de la Línea</label>
                                <input type="text" class="form-control" name="lideslin" value="{{$linea->lideslin}}">
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
