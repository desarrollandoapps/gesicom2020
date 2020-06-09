@extends('layouts.app', ['activePage' => 'giproinv', 'titlePage' => __('Crear Proyecto')])

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
                            <h4 class="card-title">Creación de {{__('giproinv')}}</h4>
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
                            <form action="{{route('giproinv.store')}} " method="POST">
                                @csrf
                                @method('POST')
                                
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Regional</label>
                                            {!! Form::select('piregion', $regionales, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'piregion']) !!}
                                            {{-- <input type="text" class="form-control" name="piregion" value="{{old('piregion')}}"> --}}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Centro de Formación</label>
                                            {{-- <input type="text" class="form-control" name="picenfor" value="{{old('picenfor')}}"> --}}
                                            {!! Form::select('picenfor', $centros, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'picenfor']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" name="pinompro" value="{{old('pinompro')}}">
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Año de formulación</label>
                                            <input type="number" class="form-control" name="pianofor" value="{{old('pianofor')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Número de radicado</label>
                                            <input type="text" class="form-control" name="pinumrad" value="{{old('pinumrad')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Valor aprobado</label>
                                            <input type="text" class="form-control" data-inputmask='"mask": "$[9]9.999.999"' name="pivalpre" id="pivalpre" value="{{old('pivalpre')}}" data-mask>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Año de ejecución</label>
                                            <input type="text" class="form-control" name="pianoeje" value="{{old('pianoeje')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Línea programática</label>
                                    <select class="custom-select form-control" name="pilinpro" id="pilinpro">
                                        <option value="">{{__('seleccione')}}</option>
                                        @foreach ($lineas as $item)
                                            <option value="{{$item->id}}">{{$item->lpnomlin}}</option>
                                        @endforeach
                                    </select>
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
    <script src="{{asset('adminlte')}}/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script>
        $('#pivalpre').inputmask();
        $('#piregion').change(function(event){            
            $.get("../centros/" + event.target.value, function(response, centros){
                $('#picenfor').empty();
                for(i = 0; i < response.length; i++)
                {
                    $('#picenfor').append("<option value='" + response[i].id + "'>" + response[i].cfnombre + "</option>");
                }
            });
        });
    </script>
@endsection