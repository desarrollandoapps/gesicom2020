@extends('layouts.app', ['activePage' => 'gigruinv', 'titlePage' => __('Crear Grupo de Investigación')])

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
                            <h4 class="card-title">Creación de Grupo de Investigación</h4>
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
                            <form action="{{route('gigruinv.store')}}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                @method('POST')
                        
                                <div class="form-group">
                                    <label>Código Colciencias</label>
                                    <input type="text" class="form-control" name="gicodgru" value="{{old('gicodgru')}}" required>
                                    <div class="invalid-feedback">Debe ingresar el código de Colciencias</div>
                                </div>
                        
                                <div class="form-group">
                                    <label>Región Plan Nacional de Desarrollo</label>
                                    <input type="text" class="form-control" name="giregpnd" value="{{old('giregpnd')}}" required>
                                    <div class="invalid-feedback">Debe ingresar la región</div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Regional</label>
                                    {!! Form::select('giregion', $regionales, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'giregion', 'required']) !!}
                                    <div class="invalid-feedback">Debe seleccionar la regional</div>
                                </div>
                        
                                <div class="form-group">
                                    <label>Centro de Formación</label>
                                    {!! Form::select('gicenfor', $centros, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'gicenfor', 'required']) !!}
                                    <div class="invalid-feedback">Debe seleccionar el centro de formación</div>
                                </div>
                        
                                <div class="form-group">
                                    <label>Nombre del Grupo</label>
                                    <input type="text" class="form-control" name="ginombre" value="{{old('ginombre')}}" required>
                                    <div class="invalid-feedback">Debe ingresar el nombre del grupo</div>
                                </div>
                        
                                <div class="form-group">
                                    <label>Mes de Creación</label>
                                    <select name="gimescre" class="custom-select form-control" required>
                                        <option value="" disabled selected>Seleccione...</option>
                                        <option value="Enero" {{ old('gimescre') == "Enero" ? 'selected' : '' }}>Enero</option>
                                        <option value="Febrero" {{ old('gimescre') == "Febrero" ? 'selected' : '' }}>Febrero</option>
                                        <option value="Marzo" {{ old('gimescre') == "Marzo" ? 'selected' : '' }}>Marzo</option>
                                        <option value="Abril" {{ old('gimescre') == "Abril" ? 'selected' : '' }}>Abril</option>
                                        <option value="Mayo" {{ old('gimescre') == "Mayo" ? 'selected' : '' }}>Mayo</option>
                                        <option value="Junio" {{ old('gimescre') == "Junio" ? 'selected' : '' }}>Junio</option>
                                        <option value="Julio" {{ old('gimescre') == "Julio" ? 'selected' : '' }}>Julio</option>
                                        <option value="Agosto" {{ old('gimescre') == "Agosto" ? 'selected' : '' }}>Agosto</option>
                                        <option value="Septiembre" {{ old('gimescre') == "Septiembre" ? 'selected' : '' }}>Septiembre</option>
                                        <option value="Octubre" {{ old('gimescre') == "Octubre" ? 'selected' : '' }}>Octubre</option>
                                        <option value="Noviembre" {{ old('gimescre') == "Noviembre" ? 'selected' : '' }}>Noviembre</option>
                                        <option value="Diciembre" {{ old('gimescre') == "Diciembre" ? 'selected' : '' }}>Diciembre</option>
                                    </select>
                                    <div class="invalid-feedback">Debe seleccionar el mes de creación</div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Año de Creación</label>
                                    <select name="gianocre" id="gianocre" class="custom-select form-control" required>
                                        <option value="" disabled selected>Seleccione...</option>
                                        @for($i = 2013; $i <= 2030; $i++)
                                            <option value="{{$i}}"{{ old('gianocre') == $i ? 'selected' : '' }}>{{$i}}</option>
                                        @endfor
                                    </select>
                                    <div class="invalid-feedback">Debe seleccionar el año de creación</div>
                                </div>

                                <div class="form-group">
                                    <label>Enlace a carpeta</label>
                                    <input type="text" class="form-control" name="gienldoc" value="{{old('gienldoc')}}"  placeholder="http://drive.google.com" required>
                                    <div class="invalid-feedback">Debe ingresar el enlace a la carpeta del grupo</div>
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
        $('#giregion').change(function(event){            
            $.get("../centros/" + event.target.value, function(response, centros){
                $('#gicenfor').append("<option value=''>Seleccione...</option>");
                $('#gicenfor').empty();
                for(i = 0; i < response.length; i++)
                {
                    $('#gicenfor').append("<option value='" + response[i].id + "'>" + response[i].cfnombre + "</option>");
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