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
                            <form action="{{route('giseminv.store')}} " method="POST">
                                @csrf
                                @method('POST')
                                
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="sinombre" id="sinombre" class="form-control">
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Tipo de documento</label>
                                            <select class="custom-select form-control" name="sitipdoc" id="sitipdoc">
                                                <option selected>Seleccione el tipo de documento</option>
                                                <option value="ti" {{ old('sitipdoc') == "ti" ? 'selected' : '' }}>Tarjeta de Identidad</option>
                                                <option value="cc" {{ old('sitipdoc') == "cc" ? 'selected' : '' }}>Cédula de ciudadanía</option>
                                                <option value="ce" {{ old('sitipdoc') == "ce" ? 'selected' : '' }}>Cédula de extrangería</option>
                                                <option value="pasaporte" {{ old('sitipdoc') == "pasaporte" ? 'selected' : '' }}>Pasaporte</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Número de documento</label>
                                            <input type="number" class="form-control" name="sinumdoc" value="{{old('sinumdoc')}}">
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
                                                <input type="text" class="form-control" name="sifecexp" value="{{old('sifecexp')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Municipio de expedición</label>
                                            <input type="text" class="form-control" name="simunexp" value="{{old('simunexp')}}">
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
                                            <input type="text" class="form-control" name="sifecnac" value="{{old('sifecnac')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Correo personal</label>
                                            <input type="email" class="form-control" name="sicorper" id="sicorper" value="{{old('sicorper')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Correo SENA</label>
                                            <input type="email" class="form-control" name="sicorsen" id="sicorsen" value="{{old('sicorsen')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Rol SENNOVA</label>
                                            <select class="custom-select form-control" name="sirolsen" id="sirolsen">
                                                <option selected>Seleccione el rol</option>
                                                <option value="Aprendiz en grupo de investigación" {{ old('sirolsen') == "agi" ? 'selected' : '' }}>Aprendiz en grupo de investigación</option>
                                                <option value="Aprendiz en semilleros" {{ old('sirolsen') == "as" ? 'selected' : '' }}>Aprendiz en semilleros</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Tipo de vinculación</label>
                                            <input type="text" class="form-control" name="sitipvin" value="{{old('sitipvin')}}">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Ultimo grado de formación recibido</label>
                                            <select class="custom-select form-control" name="sigrafor" id="sigrafor">
                                                <option selected>Seleccione el grado de formación</option>
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
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Nombre del último titulo obtenido</label>
                                            <input type="text" class="form-control" name="sititulo" id="sititulo" value="{{old('sititulo')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Profesión</label>
                                            <input type="text" class="form-control" name="siprofes" id="siprofes" value="{{old('siprofes')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Nivel de inglés</label>
                                            <select class="custom-select form-control" name="siniving" id="siniving">
                                                <option selected>Seleccione el nivel</option>
                                                <option value="Ninguno" {{ old('siniving') == "Ninguno" ? 'selected' : '' }}>Ninguno</option>
                                                <option value="A1" {{ old('siniving') == "A1" ? 'selected' : '' }}>A1</option>
                                                <option value="A2" {{ old('siniving') == "A2" ? 'selected' : '' }}>A2</option>
                                                <option value="B1" {{ old('siniving') == "B1" ? 'selected' : '' }}>B1</option>
                                                <option value="B2" {{ old('siniving') == "B2" ? 'selected' : '' }}>B2</option>
                                                <option value="C1" {{ old('siniving') == "C1" ? 'selected' : '' }}>C1</option>
                                                <option value="C2" {{ old('siniving') == "C2" ? 'selected' : '' }}>C2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Teléfono celular</label>
                                            <input type="tel" class="form-control" name="sinumcel" id="sinumcel" value="{{old('sinumcel')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Teléfono fijo</label>
                                            <input type="tel" class="form-control" name="sitelfij" id="sitelfij" value="{{old('sitelfij')}}">
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
                                            <input type="text" class="form-control" name="sititula" id="sititula" value="{{old('sititula')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Número de ficha</label>
                                            <input type="number" class="form-control" name="sinumfic" id="sinumfic" value="{{old('sinumfic')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Instructor</label>
                                            <input type="text" class="form-control" name="sinumfic" id="sinumfic" value="{{old('sinumfic')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Ambiente de formación</label>
                                            <input type="text" class="form-control" name="siambfor" id="siambfor" value="{{old('siambfor')}}">
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
                                                <input type="text" class="form-control" name="siterlec" value="{{old('siterlec')}}">
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
                                                <input type="text" class="form-control" name="siterpro" value="{{old('siterpro')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Antigüedad en el SENA en meses</label>
                                            <input type="number" class="form-control" name="siantsen" value="{{old('siantsen')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Área de conocimiento que se desempeña</label>
                                            <input type="text" class="form-control" name="siarecon" value="{{old('siarecon')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Semillero de investigación vinculado</label>
                                            <input type="number" class="form-control" name="siantsen" value="{{old('siantsen')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Vinculación a un proyecto REDCOLSI</label>
                                            <input type="number" class="form-control" name="siprored" value="{{old('siprored')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Participación RedCOLSI</label>
                                            <select class="custom-select form-control" name="siparred" id="siparred">
                                                <option selected>Seleccione</option>
                                                <option value="Si" {{ old('siparred') == "Si" ? 'selected' : '' }}>Si</option>
                                                <option value="No" {{ old('siparred') == "No" ? 'selected' : '' }}>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Curso de Investigación a realizar</label>
                                            <select class="custom-select form-control" name="sicurinv" id="sicurinv">
                                                <option selected>Seleccione</option>
                                                <option value="Si" {{ old('sicurinv') == "Si" ? 'selected' : '' }}>Si</option>
                                                <option value="No" {{ old('sicurinv') == "No" ? 'selected' : '' }}>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Formulación de proyecto</label>
                                            <select class="custom-select form-control" name="siforpro" id="siforpro">
                                                <option selected>Seleccione</option>
                                                <option value="Si" {{ old('siforpro') == "Si" ? 'selected' : '' }}>Si</option>
                                                <option value="No" {{ old('siforpro') == "No" ? 'selected' : '' }}>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Capacitación en investigación</label>
                                            <select class="custom-select form-control" name="sicapaci" id="sicapaci">
                                                <option selected>Seleccione</option>
                                                @foreach ($capacitaciones as $item)
                                                    <option value="{{$item->id}}">{{$item->csnombre}}</option>
                                                @endforeach
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
    <script>
        $('.date').datepicker({
            language: 'es',
            autoclose: true
        });
    </script>
@endsection