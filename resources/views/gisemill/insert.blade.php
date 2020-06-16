@extends('layouts.app', ['activePage' => 'gisemill', 'titlePage' => __('Crear Semillero')])

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
                            <h4 class="card-title">Creación de Semillero</h4>
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
                            <form action="{{route('gisemill.store')}} " method="POST">
                                @csrf
                                @method('POST')
                                
                                <div class="form-group">
                                    <label>Regional</label>
                                    {!! Form::select('giregion', $regionales, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'giregion']) !!}
                                </div>
                                <div class="form-group">
                                    <label>Centro de Formación</label>
                                    {!! Form::select('gicenfor', $centros, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'gicenfor']) !!}
                                </div>
                                <div class="form-group">
                                    <label>Grupo de investigación</label>
                                    {!! Form::select('segruinv', $grupos, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'segruinv']) !!}
                                </div>
                                <div class="form-group">
                                    <label>Código del semillero</label>
                                    <input type="text" class="form-control" name="seidsemi" value="{{old('seidsemi')}}">
                                </div>

                                <div class="form-group">
                                    <label>Nombre del semillero</label>
                                    <input type="text" class="form-control" name="senombre" value="{{old('senombre')}}">
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
    <script src="{{asset('adminlte')}}/plugins/moment/moment.min.js"></script>
    <script>
        $('#giregion').change(function(event){            
            $.get("../centros/" + event.target.value, function(response, centros){
                $('#gicenfor').empty();
                $('#gicenfor').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#gicenfor').append("<option value='" + response[i].id + "'>" + response[i].cfnombre + "</option>");
                }
            });
        });
        $('#gicenfor').change(function(event){            
            $.get("../grupos/" + event.target.value, function(response, grupos){
                $('#segruinv').empty();
                $('#segruinv').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#segruinv').append("<option value='" + response[i].id + "'>" + response[i].ginombre + "</option>");
                }
            });
        });
    </script>
@endsection