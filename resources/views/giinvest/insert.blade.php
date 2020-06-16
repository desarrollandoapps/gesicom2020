@extends('layouts.app', ['activePage' => 'giinvest', 'titlePage' => __('Crear Investigador')])

@section('hidden-search')
    hidden
@endsection

@section('estilos')
    <link rel="stylesheet" href="{{asset('datepicker')}}/bootstrap-datepicker.min.css">
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Creación de {{__('giinvest')}}</h4>
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
                            <form action="{{route('giinvest.store')}} " method="POST">
                                @csrf
                                @method('POST')
                                
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="innombre" id="innombre" class="form-control" value="{{old('innombre')}}">
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Tipo de documento</label>
                                            <select class="custom-select form-control" name="intipdoc" id="intipdoc">
                                                <option selected value="">{{__('seleccione')}}</option>
                                                <option value="C.C." {{ old('intipdoc') == "C.C." ? 'selected' : '' }}>Cédula de ciudadanía</option>
                                                <option value="C.C." {{ old('intipdoc') == "C.C." ? 'selected' : '' }}>Cédula de extrangería</option>
                                                <option value="Pasaporte" {{ old('intipdoc') == "Pasaporte" ? 'selected' : '' }}>Pasaporte</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Número de documento</label>
                                            <input type="number" class="form-control" name="innumdoc" value="{{old('innumdoc')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Fecha de expedición</label>
                                            <div class="input-group date" data-provide="datepicker" id="infecexp">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                  </div>
                                                <input type="text" class="form-control" name="infecexp" value="{{old('infecexp')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Municipio de expedición</label>
                                            <input type="text" class="form-control" name="inmunexp" value="{{old('inmunexp')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Fecha de nacimiento</label>
                                        <div class="input-group date" data-provide="datepicker" id="infecnac">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                              </div>
                                            <input type="text" class="form-control" name="infecnac" value="{{old('infecnac')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Correo personal</label>
                                            <input type="email" class="form-control" name="incorper" id="incorper" value="{{old('incorper')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Correo SENA o MiSENA</label>
                                            <input type="email" class="form-control" name="incorsen" id="incorsen" value="{{old('incorsen')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Teléfono celular</label>
                                            <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' name="innumcel" id="innumcel" value="{{old('innumcel')}}" data-mask>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Teléfono fijo</label>
                                            <input type="text" class="form-control" data-inputmask='"mask": "(9) 999-9999"' name="intelfij" id="intelfij" value="{{old('intelfij')}}" data-mask>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Número de IP</label>
                                            <input type="text" class="form-control" name="innumeip" id="innumeip" value="{{old('innumeip')}}">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Último grado de formación recibido</label>
                                            <select class="custom-select form-control" name="ingrafor" id="ingrafor">
                                                <option selected value="">{{__('seleccione')}}</option>
                                                <option value="Primaria" {{ old('ingrafor') == "Primaria" ? 'selected' : '' }}>Primaria</option>
                                                <option value="Bachillerato" {{ old('ingrafor') == "Bachillerato" ? 'selected' : '' }}>Bachillerato</option>
                                                <option value="Operario o auxiliar" {{ old('ingrafor') == "Operario o auxiliar" ? 'selected' : '' }}>Operario o auxiliar</option>
                                                <option value="Técnico" {{ old('ingrafor') == "Técnico" ? 'selected' : '' }}>Técnico</option>
                                                <option value="Tecnólogo " {{ old('ingrafor') == "Tecnólogo " ? 'selected' : '' }}>Tecnólogo</option>
                                                <option value="Pregrado universitario" {{ old('ingrafor') == "Pregrado universitario" ? 'selected' : '' }}>Pregrado universitario</option>
                                                <option value="Posgrado especialización" {{ old('ingrafor') == "Posgrado especialización" ? 'selected' : '' }}>Posgrado especialización</option>
                                                <option value="Posgrado maestría" {{ old('ingrafor') == "Posgrado maestría" ? 'selected' : '' }}>Posgrado maestría</option>
                                                <option value="Posgrado doctorado" {{ old('ingrafor') == "Posgrado doctorado" ? 'selected' : '' }}>Posgrado doctorado</option>
                                                <option value="Posgrado Post-doctorado" {{ old('ingrafor') == "Posgrado Post-doctorado" ? 'selected' : '' }}>Posgrado Post-doctorado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Nombre del último titulo obtenido</label>
                                            <input type="text" class="form-control" name="intitulo" id="intitulo" value="{{old('intitulo')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Profesión</label>
                                            <input type="text" class="form-control" name="inprofes" id="inprofes" value="{{old('inprofes')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Nivel de inglés</label>
                                            <select class="custom-select form-control" name="inniving" id="inniving">
                                                <option selected value="">{{__('seleccione')}}</option>
                                                <option value="Ninguno" {{ old('inniving') == "Ninguno" ? 'selected' : '' }}>Ninguno</option>
                                                <option value="A1" {{ old('inniving') == "A1" ? 'selected' : '' }}>A1</option>
                                                <option value="A2" {{ old('inniving') == "A2" ? 'selected' : '' }}>A2</option>
                                                <option value="B1" {{ old('inniving') == "B1" ? 'selected' : '' }}>B1</option>
                                                <option value="B2" {{ old('inniving') == "B2" ? 'selected' : '' }}>B2</option>
                                                <option value="C1" {{ old('inniving') == "C1" ? 'selected' : '' }}>C1</option>
                                                <option value="C2" {{ old('inniving') == "C2" ? 'selected' : '' }}>C2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Regional</label>
                                            {!! Form::select('inregion', $regionales, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'inregion']) !!}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Centro de formación</label>
                                            {!! Form::select('incenfor', $centros, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'incenfor']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Grupo de investigación vinculado</label>
                                            {!! Form::select('ingruinv', $grupos, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'ingruinv']) !!}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Semillero de investigación vinculado</label>
                                            {!! Form::select('insemill', $semilleros, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'insemill']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Línea de investigación</label>
                                            {!! Form::select('inlininv', $lineas, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'inlininv']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Rol SENNOVA</label>
                                            {!! Form::select('inrolsen', $roles, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'inrolsen']) !!}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Tipo de vinculación</label>
                                            {!! Form::select('intipvin', $vinculaciones, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'intipvin']) !!}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Cargo</label>
                                            {!! Form::select('incarinv', $cargos, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'incarinv']) !!}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Grado</label>
                                            {!! Form::select('innumgra', $grados, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'innumgra']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Porcentaje de dedicación al grupo</label>
                                            <input type="number" class="form-control" name="inporded" id="inporded" value="{{old('inporded')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Antigüedad en el SENA en meses</label>
                                            <input type="number" class="form-control" name="inantsen" value="{{old('inantsen')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Programa de formación</label>
                                            {{-- <input type="text" class="form-control" name="inprofor" id="inprofor" value="{{old('inprofor')}}"> --}}
                                            {!! Form::select('inprofor', $programas, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'inprofor']) !!}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Área de conocimiento en que se desempeña</label>
                                            <select class="custom-select form-control" name="inarecon" id="inarecon">
                                                <option selected value="">{{__('seleccione')}}</option>
                                                <option value="Arte" {{ old('inarecon') == "Arte" ? 'selected' : '' }}>Arte</option>
                                                <option value="Biología" {{ old('inarecon') == "Biología" ? 'selected' : '' }}>Biología</option>
                                                <option value="Ciencias biológicas" {{ old('inarecon') == "Ciencias biológicas" ? 'selected' : '' }}>Ciencias biológicas</option>
                                                <option value="Ciencias de la educación" {{ old('inarecon') == "Ciencias de la educación" ? 'selected' : '' }}>Ciencias de la educación</option>
                                                <option value="Ciencias de la información" {{ old('inarecon') == "Ciencias de la información" ? 'selected' : '' }}>Ciencias de la información</option>
                                                <option value="Ciencias de la salud" {{ old('inarecon') == "Ciencias de la salud" ? 'selected' : '' }}>Ciencias de la salud</option>
                                                <option value="Ciencias de la tierra y del espacio" {{ old('inarecon') == "Ciencias de la tierra y del espacio" ? 'selected' : '' }}>Ciencias de la tierra y del espacio</option>
                                                <option value="Ciencias del espiritu" {{ old('inarecon') == "Ciencias del espiritu" ? 'selected' : '' }}>Ciencias del espiritu</option>
                                                <option value="Ciencias del hombre" {{ old('inarecon') == "Ciencias del hombre" ? 'selected' : '' }}>Ciencias del hombre</option>
                                                <option value="Ciencias del lenguaje" {{ old('inarecon') == "Ciencias del lenguaje" ? 'selected' : '' }}>Ciencias del lenguaje</option>
                                                <option value="Filosofía" {{ old('inarecon') == "Filosofía" ? 'selected' : '' }}>Filosofía</option>
                                                <option value="Fíinca" {{ old('inarecon') == "Fíinca" ? 'selected' : '' }}>Fíinca</option>
                                                <option value="Ingeniería" {{ old('inarecon') == "Ingeniería" ? 'selected' : '' }}>Ingeniería</option>
                                                <option value="Matemáticas" {{ old('inarecon') == "Matemáticas" ? 'selected' : '' }}>Matemáticas</option>
                                                <option value="Química" {{ old('inarecon') == "Química" ? 'selected' : '' }}>Química</option>
                                                <option value="Ninguna de las anteriores" {{ old('inarecon') == "Ninguna de las anteriores" ? 'selected' : '' }}>Ninguna de las anteriores</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Asignación salarial mensual</label>
                                            <input type="text" data-inputmask='"mask": "$[9].999.999"' class="form-control" name="inasimen" id="inasimen" value="{{old('inasimen')}}" data-mask>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Número de contrato</label>
                                            <input type="text" class="form-control" name="innumcon" id="innumcon" value="{{old('innumcon')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>¿Está contratado?</label>
                                            <select class="custom-select form-control" name="inestcon" id="inestcon">
                                                <option selected value="">{{__('seleccione')}}</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
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
    <script src="{{asset('datepicker')}}/bootstrap-datepicker.min.js"></script>
    <script src="{{asset('adminlte')}}/plugins/moment/moment.min.js"></script>
    <script src="{{asset('adminlte')}}/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script>
        $('.date').datepicker({
            format: 'yyyy-mm-dd',
            language: 'es',
            autoclose: true,
        });
        $('#innumcel').inputmask();
        $('#intelfij').inputmask();
        $('#inasimen').inputmask();
        $('#inregion').change(function(event){            
            $.get("../centros/" + event.target.value, function(response, centros){
                $('#incenfor').empty();
                $('#incenfor').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#incenfor').append("<option value='" + response[i].id + "'>" + response[i].cfnombre + "</option>");
                }
            });
        });
        $('#incenfor').change(function(event){            
            $.get("../grupos/" + event.target.value, function(response, grupos){
                $('#ingruinv').empty();
                $('#ingruinv').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#ingruinv').append("<option value='" + response[i].id + "'>" + response[i].ginombre + "</option>");
                }
            });
        });
        $('#ingruinv').change(function(event){            
            $.get("../semilleros/" + event.target.value, function(response, semilleros){
                $('#insemill').empty();
                for(i = 0; i < response.length; i++)
                {
                    $('#insemill').append("<option value='" + response[i].id + "'>" + response[i].senombre + "</option>");
                }
            });
            $.get("../lineas/" + event.target.value, function(response, lineas){
                $('#inlininv').empty();
                $('#inlininv').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#inlininv').append("<option value='" + response[i].id + "'>" + response[i].lideslin + "</option>");
                }
            });
        });
    </script>
@endsection
