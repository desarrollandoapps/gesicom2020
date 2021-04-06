@extends('layouts.app', ['activePage' => 'giseminv', 'titlePage' => __('Crear Semillero de Investigación')])

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
                            <h4 class="card-title">Creación de {{__('giseminv')}}</h4>
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
                            <form action="{{route('giseminv.store')}}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                @method('POST')
                                
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="sinombre" id="sinombre" class="form-control" value="{{old('sinombre')}}" required>
                                    <div class="invalid-feedback">Debe ingresar el nombre</div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Tipo de documento</label>
                                            <select class="custom-select form-control" name="sitipdoc" id="sitipdoc" required>
                                                <option selected value="">{{__('seleccione')}}</option>
                                                <option value="T.I." {{ old('sitipdoc') == "T.I." ? 'selected' : '' }}>Tarjeta de Identidad</option>
                                                <option value="C.C." {{ old('sitipdoc') == "C.C." ? 'selected' : '' }}>Cédula de ciudadanía</option>
                                                <option value="C.C." {{ old('sitipdoc') == "C.C." ? 'selected' : '' }}>Cédula de extrangería</option>
                                                <option value="Pasaporte" {{ old('sitipdoc') == "Pasaporte" ? 'selected' : '' }}>Pasaporte</option>
                                            </select>
                                            <div class="invalid-feedback">Debe seleccionar el tipo de documento</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Número de documento</label>
                                            <input type="number" class="form-control" name="sinumdoc" value="{{old('sinumdoc')}}" required>
                                            <div class="invalid-feedback">Debe ingresar el número del documento</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Fecha de expedición</label>
                                            <div class="input-group date" data-provide="datepicker" id="sifecexp">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                  </div>
                                                <input type="text" class="form-control" name="sifecexp" value="{{old('sifecexp')}}" >
                                                <div class="invalid-feedback">Debe seleccionar la fecha de expedición del documento</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Municipio de expedición</label>
                                            <input type="text" class="form-control" name="simunexp" value="{{old('simunexp')}}" >
                                            <div class="invalid-feedback">Debe ingresar el municipio de expedición del documento</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Fecha de nacimiento</label>
                                        <div class="input-group date" data-provide="datepicker" id="sifecnac">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                              </div>
                                            <input type="text" class="form-control" name="sifecnac" value="{{old('sifecnac')}}" >
                                            <div class="invalid-feedback">Debe seleccionar la fecha de nacimiento</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Correo personal</label>
                                            <input type="email" class="form-control" name="sicorper" id="sicorper" value="{{old('sicorper')}}" >
                                            <div class="invalid-feedback">Debe ingresar un correo válido</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Correo SENA o MiSENA</label>
                                            <input type="email" class="form-control" name="sicorsen" id="sicorsen" value="{{old('sicorsen')}}" >
                                            <div class="invalid-feedback">Debe ingresar un correo válido</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Rol SENNOVA</label>
                                            <select class="custom-select form-control" name="sirolsen" id="sirolsen" >
                                                <option selected value="">{{__('seleccione')}}</option>
                                                <option value="Aprendiz en grupo de investigación" {{ old('sirolsen') == "Aprendiz en grupo de investigación" ? 'selected' : '' }}>Aprendiz en grupo de investigación</option>
                                                <option value="Aprendiz en semilleros" {{ old('sirolsen') == "Aprendiz en semilleros" ? 'selected' : '' }}>Aprendiz en semilleros</option>
                                            </select>
                                            <div class="invalid-feedback">Debe seleccionar el rol SENNOVA</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Tipo de vinculación</label>
                                            {{-- <input type="text" class="form-control" name="sitipvin" value="{{old('sitipvin')}}" > --}}
                                            <select class="custom-select form-control" name="sitipvin" id="sitipvin" >
                                                <option selected value="">{{__('seleccione')}}</option>
                                                <option value="Monitor" {{ old('sitipvin') == "Monitor" ? 'selected' : '' }}>Monitor</option>
                                                <option value="Contrato de aprendizaje" {{ old('sitipvin') == "Contrato de aprendizaje" ? 'selected' : '' }}>Contrato de aprendizaje</option>
                                                <option value="Ninguna" {{ old('sitipvin') == "Ninguna" ? 'selected' : '' }}>Ninguna</option>
                                            </select>
                                            <div class="invalid-feedback">Debe ingresar el tipo de vinculación</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Último grado de formación</label>
                                            <select class="custom-select form-control" name="sigrafor" id="sigrafor" >
                                                <option selected value="">{{__('seleccione')}}</option>
                                                <option value="Primaria" {{ old('sigrafor') == "Primaria" ? 'selected' : '' }}>Primaria</option>
                                                <option value="Bachillerato" {{ old('sigrafor') == "Bachillerato" ? 'selected' : '' }}>Bachillerato</option>
                                                <option value="Operario o auxiliar" {{ old('sigrafor') == "Operario o auxiliar" ? 'selected' : '' }}>Operario o auxiliar</option>
                                                <option value="Técnico" {{ old('sigrafor') == "Técnico" ? 'selected' : '' }}>Técnico</option>
                                                <option value="Tecnólogo " {{ old('sigrafor') == "Tecnólogo " ? 'selected' : '' }}>Tecnólogo</option>
                                                <option value="Pregrado universitario" {{ old('sigrafor') == "Pregrado universitario" ? 'selected' : '' }}>Pregrado universitario</option>
                                                <option value="Posgrado especialización" {{ old('sigrafor') == "Posgrado especialización" ? 'selected' : '' }}>Posgrado especialización</option>
                                                <option value="Posgrado maestria" {{ old('sigrafor') == "Posgrado maestria" ? 'selected' : '' }}>Posgrado maestria</option>
                                                <option value="Posgrado doctorado" {{ old('sigrafor') == "Posgrado doctorado" ? 'selected' : '' }}>Posgrado doctorado</option>
                                                <option value="Post - doctorado" {{ old('sigrafor') == "Post - doctorado" ? 'selected' : '' }}>Post - doctorado</option>
                                            </select>
                                            <div class="invalid-feedback">Debe seleccionar el último grado de formación recibido</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Nombre del último titulo obtenido</label>
                                            <input type="text" class="form-control" name="sititulo" id="sititulo" value="{{old('sititulo')}}" >
                                            <div class="invalid-feedback">Debe ingresar el nombre del último título obtenido</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Profesión</label>
                                            <input type="text" class="form-control" name="siprofes" id="siprofes" value="{{old('siprofes')}}" >
                                            <div class="invalid-feedback">Debe ingresar la profesión</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Nivel de inglés</label>
                                            <select class="custom-select form-control" name="siniving" id="siniving" >
                                                <option selected value="">{{__('seleccione')}}</option>
                                                <option value="Ninguno" {{ old('siniving') == "Ninguno" ? 'selected' : '' }}>Ninguno</option>
                                                <option value="A1" {{ old('siniving') == "A1" ? 'selected' : '' }}>A1</option>
                                                <option value="A2" {{ old('siniving') == "A2" ? 'selected' : '' }}>A2</option>
                                                <option value="B1" {{ old('siniving') == "B1" ? 'selected' : '' }}>B1</option>
                                                <option value="B2" {{ old('siniving') == "B2" ? 'selected' : '' }}>B2</option>
                                                <option value="C1" {{ old('siniving') == "C1" ? 'selected' : '' }}>C1</option>
                                                <option value="C2" {{ old('siniving') == "C2" ? 'selected' : '' }}>C2</option>
                                            </select>
                                            <div class="invalid-feedback">Debe seleccionar el nivel de inglés</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Teléfono celular</label>
                                            <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' name="sinumcel" id="sinumcel" value="{{old('sinumcel')}}" data-mask >
                                            <div class="invalid-feedback">Debe ingresar el número de teléfono celular</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Teléfono fijo</label>
                                            <input type="text" class="form-control" data-inputmask='"mask": "(9) 999-9999"' name="sitelfij" id="sitelfij" value="{{old('sitelfij')}}" data-mask >
                                            <div class="invalid-feedback">Debe ingresar el número de teléfono fijo</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Número de IP</label>
                                            <input type="text" class="form-control" name="sinumeip" id="sinumeip" value="{{old('sinumeip')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Titulación</label>
                                            {!! Form::select('sititula', $programas, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'sititula']) !!}
                                            <div class="invalid-feedback">Debe seleccionar la titulación</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Número de ficha</label>
                                            <input type="number" class="form-control" name="sinumfic" id="sinumfic" value="{{old('sinumfic')}}" >
                                            <div class="invalid-feedback">Debe ingresar el número de ficha</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Instructor</label>
                                            <input type="text" class="form-control" name="siinstru" id="siinstru" value="{{old('siinstru')}}" >
                                            <div class="invalid-feedback">Debe ingresar el nombre del instructor</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Ambiente de formación</label>
                                            <input type="text" class="form-control" name="siambfor" id="siambfor" value="{{old('siambfor')}}" >
                                            <div class="invalid-feedback">Debe ingresar el código del ambiente de formación</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Fecha de terminación etapa lectiva</label>
                                            <div class="input-group date" data-provide="datepicker" id="siterlec">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                  </div>
                                                <input type="text" class="form-control" name="siterlec" value="{{old('siterlec')}}" >
                                                <div class="invalid-feedback">Debe seleccionar la fecha de terminación de la etapa lectiva</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Fecha de terminación etapa productiva</label>
                                            <div class="input-group date" data-provide="datepicker" id="siterpro">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                  </div>
                                                <input type="text" class="form-control" name="siterpro" value="{{old('siterpro')}}" >
                                                <div class="invalid-feedback">Debe seleccionar la fecha de terminación de la etapa productiva</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    {{-- <div class="col">
                                        <div class="form-group">
                                            <label>Antigüedad en el SENA en meses</label>
                                            <input type="number" class="form-control" name="siantsen" value="{{old('siantsen')}}" >
                                            <div class="invalid-feedback">Debe seleccionar la antigüedad en el SENA</div>
                                        </div>
                                    </div> --}}
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Área de conocimiento en que se desempeña</label>
                                            <select class="custom-select form-control" name="siarecon" id="siarecon" >
                                                <option selected value="">{{__('seleccione')}}</option>
                                                <option value="Arte" {{ old('siarecon') == "Arte" ? 'selected' : '' }}>Arte</option>
                                                <option value="Biología" {{ old('siarecon') == "Biología" ? 'selected' : '' }}>Biología</option>
                                                <option value="Ciencias biológicas" {{ old('siarecon') == "Ciencias biológicas" ? 'selected' : '' }}>Ciencias biológicas</option>
                                                <option value="Ciencias de la educación" {{ old('siarecon') == "Ciencias de la educación" ? 'selected' : '' }}>Ciencias de la educación</option>
                                                <option value="Ciencias de la información" {{ old('siarecon') == "Ciencias de la información" ? 'selected' : '' }}>Ciencias de la información</option>
                                                <option value="Ciencias de la salud" {{ old('siarecon') == "Ciencias de la salud" ? 'selected' : '' }}>Ciencias de la salud</option>
                                                <option value="Ciencias de la tierra y del espacio" {{ old('siarecon') == "Ciencias de la tierra y del espacio" ? 'selected' : '' }}>Ciencias de la tierra y del espacio</option>
                                                <option value="Ciencias del espiritu" {{ old('siarecon') == "Ciencias del espiritu" ? 'selected' : '' }}>Ciencias del espiritu</option>
                                                <option value="Ciencias del hombre" {{ old('siarecon') == "Ciencias del hombre" ? 'selected' : '' }}>Ciencias del hombre</option>
                                                <option value="Ciencias del lenguaje" {{ old('siarecon') == "Ciencias del lenguaje" ? 'selected' : '' }}>Ciencias del lenguaje</option>
                                                <option value="Filosofía" {{ old('siarecon') == "Filosofía" ? 'selected' : '' }}>Filosofía</option>
                                                <option value="Física" {{ old('siarecon') == "Física" ? 'selected' : '' }}>Física</option>
                                                <option value="Ingeniería" {{ old('siarecon') == "Ingeniería" ? 'selected' : '' }}>Ingeniería</option>
                                                <option value="Matemáticas" {{ old('siarecon') == "Matemáticas" ? 'selected' : '' }}>Matemáticas</option>
                                                <option value="Química" {{ old('siarecon') == "Química" ? 'selected' : '' }}>Química</option>
                                                <option value="Ninguna de las anteriores" {{ old('siarecon') == "Ninguna de las anteriores" ? 'selected' : '' }}>Ninguna de las anteriores</option>
                                            </select>
                                            <div class="invalid-feedback">Debe seleccionar el área de conocimiento en que se desempeña</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Regional</label>
                                            {!! Form::select('siregion', $regionales, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'siregion', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar la regional</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Centro de formación</label>
                                            {!! Form::select('sicenfor', $centros, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'sicenfor', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar el centro de formación</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Grupo de investigación vinculado</label>
                                            {!! Form::select('sigruinv', $grupos, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'sigruinv', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar el grupo de investigación</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Semillero de investigación vinculado</label>
                                            {!! Form::select('sisemill', $semilleros, null, ['placeholder' => 'Seleccione...', 'class' => 'custom-select form-control', 'id' => 'sisemill', 'required']) !!}
                                            <div class="invalid-feedback">Debe seleccionar el semillero de investigación</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Proyecto vinculado</label>
                                    <select class="custom-select form-control js-example-basic-single" name="siproyec" id="siproyec" required>
                                        <option selected value="">{{__('seleccione')}}</option>
                                        @foreach ($proyectos as $item)
                                            <option value="{{$item->id}}" {{old('siproyec') == $item->id ? 'selected' : '' }}>{{$item->pinompro}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Debe seleccionar el proyecto de investigación vinculado</div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Proyecto RedColSI</label>
                                            <input type="text" class="form-control" name="siprored" value="{{old('siprored')}}" >
                                            <div class="invalid-feedback">Debe indicar el nombre del proyecto RedColSI o indicar si No Aplica</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Participación RedColSI</label>
                                            <select class="custom-select form-control" name="siparred" id="siparred" required>
                                                <option selected value="">{{__('seleccione')}}</option>
                                                <option value="Si" {{ old('siparred') == "Si" ? 'selected' : '' }}>Si</option>
                                                <option value="No" {{ old('siparred') == "No" ? 'selected' : '' }}>No</option>
                                            </select>
                                            <div class="invalid-feedback">Debe seleccionar si el semillero ha participado en RedColSI</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Formulación de proyecto</label>
                                            <select class="custom-select form-control" name="siforpro" id="siforpro" required>
                                                <option selected value="">{{__('seleccione')}}</option>
                                                <option value="Si" {{ old('siforpro') == "Si" ? 'selected' : '' }}>Si</option>
                                                <option value="No" {{ old('siforpro') == "No" ? 'selected' : '' }}>No</option>
                                            </select>
                                            <div class="invalid-feedback">Debe seleccionar si el semillero ha formualdo un proyecto</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Curso de Investigación a realizar</label>
                                            <select class="custom-select form-control" name="sicurinv" id="sicurinv" required>
                                                <option selected value="">{{__('seleccione')}}</option>
                                                <option value="Si" {{ old('sicurinv') == "Si" ? 'selected' : '' }}>Si</option>
                                                <option value="No" {{ old('sicurinv') == "No" ? 'selected' : '' }}>No</option>
                                            </select>
                                            <div class="invalid-feedback">Debe seleccionar si debe realizar el curso de investigación</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Capacitación en investigación</label>
                                            @foreach ($capacitaciones as $item)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="{{$item->id}}" id="{{$item->id}}" name="sicapa{{$item->id}}">
                                                    <label class="form-check-label" for="{{$item->id}}">
                                                        {{$item->csnombre}}
                                                    </label>
                                                </div>
                                            @endforeach
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
        $('#sifecnac').datepicker().on('changeDate', function (e){
            let sifecexp = $('#sifecexp').datepicker('getDate');
            let sifecnac = $('#sifecnac').datepicker('getDate');
            if(sifecexp < sifecnac) {
                swal("¡Atención!", "La fecha de nacimiento debe ser inferior a la fecha de expedición del documento", "warning");
            }
        });
        $('#sinumcel').inputmask();
        $('#sitelfij').inputmask();
        $('#siregion').change(function(event){            
            $.get("../centros/" + event.target.value, function(response, centros){
                $('#sicenfor').empty();
                $('#sicenfor').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#sicenfor').append("<option value='" + response[i].id + "'>" + response[i].cfnombre + "</option>");
                }
            });
        });
        $('#sicenfor').change(function(event){            
            $.get("../grupos/" + event.target.value, function(response, grupos){
                $('#sigruinv').empty();
                $('#sigruinv').append("<option value=''>Seleccione...</option>");
                for(i = 0; i < response.length; i++)
                {
                    $('#sigruinv').append("<option value='" + response[i].id + "'>" + response[i].ginombre + "</option>");
                }
            });
        });
        $('#sigruinv').change(function(event){            
            $.get("../semilleros/" + event.target.value, function(response, semilleros){
                $('#sisemill').empty();
                for(i = 0; i < response.length; i++)
                {
                    $('#sisemill').append("<option value='" + response[i].id + "'>" + response[i].senombre + "</option>");
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
                    let infecexp = $('#infecexp').datepicker('getDate');
                    let infecnac = $('#infecnac').datepicker('getDate');
                    if(infecexp < infecnac) {
                        swal("¡Atención!", "La fecha de nacimiento debe ser inferior a la fecha de expedición del documento", "warning");
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                }, false);
                });
            }, false);
        })();
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
