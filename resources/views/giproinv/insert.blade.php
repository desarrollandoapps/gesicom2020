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
                            <form action="{{route('giproinv.store')}}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                @method('POST')
                                
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Regional</label>
                                            {!! Form::select('piregion', $regionales, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'piregion', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar la regional</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Centro de Formación</label>
                                            {!! Form::select('picenfor', $centros, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'picenfor', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar el centro de formación</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Grupo de investigación</label>
                                            {!! Form::select('pigruinv', $grupos, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'pigruinv', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar el grupo de investigación</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" name="pinompro" value="{{old('pinompro')}}" required>
                                    <div class="invalid-feedback">Debe ingresar el nombre del proyecto</div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Año de formulación</label>
                                            {{-- <input type="number" class="form-control" name="pianofor" value="{{old('pianofor')}}"> --}}
                                            <select name="pianofor" id="gianocre" class="custom-select form-control" required>
                                                <option value="" disabled selected>Seleccione...</option>
                                                @for($i = 2013; $i <= 2030; $i++)
                                                    <option value="{{$i}}"{{ old('pianofor') == $i ? 'selected' : '' }}>{{$i}}</option>
                                                @endfor
                                            </select>
                                            <div class="invalid-feedback">Debe seleccionar el año de formulación</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Número de radicado</label>
                                            <input type="text" class="form-control" name="pinumrad" value="{{old('pinumrad')}}" required>
                                            <div class="invalid-feedback">Debe ingresar el número de radicado</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Valor aprobado</label>
                                            <input type="text" class="form-control" data-inputmask='"mask": "$9[9].999.999"' name="pivalpre" id="pivalpre" value="{{old('pivalpre')}}" data-mask  required>
                                            <div class="invalid-feedback">Debe ingresar el valor aprobado</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Año de ejecución</label>
                                            {{-- <input type="text" class="form-control" name="pianoeje" value="{{old('pianoeje')}}"> --}}
                                            <select name="pianoeje" id="gianocre" class="custom-select form-control" required>
                                                <option value="" disabled selected>Seleccione...</option>
                                                @for($i = 2013; $i <= 2030; $i++)
                                                    <option value="{{$i}}"{{ old('pianoeje') == $i ? 'selected' : '' }}>{{$i}}</option>
                                                @endfor
                                            </select>
                                            <div class="invalid-feedback">Debe seleccionar el año de ejecución</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Línea programática</label>
                                    {!! Form::select('pilinpro', $lineas, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'pilinpro', 'required']) !!}
                                    <div class="invalid-feedback">Debe seleccionar la línea programática</div>
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
                $('#picenfor').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#picenfor').append("<option value='" + response[i].id + "'>" + response[i].cfnombre + "</option>");
                }
            });
        });
        $('#picenfor').change(function(event){            
            $.get("../grupos/" + event.target.value, function(response, grupos){
                $('#pigruinv').empty();
                $('#pigruinv').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#pigruinv').append("<option value='" + response[i].id + "'>" + response[i].ginombre + "</option>");
                }
            });
        });
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                }, false);
                });
            }, false);
        })();
    </script>
@endsection