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
                                {!! Form::select('seregion', $regionales, $semillero->regional, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'seregion']) !!}
                            </div>
                            <div class="form-group">
                                <label>Centro de Formación</label>
                                {!! Form::select('secenfor', $centros, $semillero->centro, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'secenfor']) !!}
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

@section('scripts')
    <script>
        $('#seregion').change(function(event){                        
            $.get("../../centros/" + event.target.value, function(response, centros){
                $('#secenfor').empty();
                $('#secenfor').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#secenfor').append("<option value='" + response[i].id + "'>" + response[i].cfnombre + "</option>");
                }
            });
        });

        $('#secenfor').change(function(event) {
            $.get("../../grupos/" + event.target.value, function(response, grupos) {
                $("#segruinv").empty();
                $('#segruinv').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#segruinv').append("<option value='" + response[i].id + "'>" + response[i].ginombre + "</option>");
                }
            });
        });
    </script>
@endsection