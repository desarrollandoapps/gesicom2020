@extends('layouts.app', ['activePage' => 'gisemill', 'titlePage' => __('Modificar Semillero')])

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
                        <h4 class="card-title">Modificar Semillero</h4>
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
                        <form action="{{route('gisemill.update', $semillero->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                        
                            <div class="form-group">
                                <label>Regional</label>
                                {!! Form::select('giregion', $regionales, $semillero->regional, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'giregion']) !!}
                            </div>
                            <div class="form-group">
                                <label>Centro de Formación</label>
                                {!! Form::select('gicenfor', $centros, $semillero->centro, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'gicenfor']) !!}
                            </div>
                            <div class="form-group">
                                <label>Grupo de investigación</label>
                                {!! Form::select('segruinv', $grupos, $semillero->segruinv, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'segruinv']) !!}
                            </div>
                            <div class="form-group">
                                <label>Código del semillero</label>
                                <input type="text" class="form-control" name="seidsemi" value="{{$semillero->seidsemi}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nombre del semillero</label>
                                <input type="text" class="form-control" name="senombre" value="{{$semillero->senombre}}">
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
