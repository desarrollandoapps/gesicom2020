@extends('layouts.app', ['activePage' => 'giseminv', 'titlePage' => __('Modificar Integrante de Semillero')])

@section('searchHidden')
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
                        <h4 class="card-title">Modificar Integrante de Semillero</h4>
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
                        <form action="{{route('giseminv.update', $semillero->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                        
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="sinombre" id="sinombre" class="form-control" value="{{$semillero->sinombre}}">
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Tipo de documento</label>
                                        <select class="custom-select form-control" name="sitipdoc" id="sitipdoc">
                                            <option selected value="">{{__('seleccione')}}</option>
                                            <option value="T.I." {{ $semillero->sitipdoc == "T.I." ? 'selected' : '' }}>Tarjeta de Identidad</option>
                                            <option value="C.C." {{ $semillero->sitipdoc == "C.C." ? 'selected' : '' }}>Cédula de ciudadanía</option>
                                            <option value="C.E." {{ $semillero->sitipdoc == "C.E." ? 'selected' : '' }}>Cédula de extrangería</option>
                                            <option value="Pasaporte" {{ $semillero->sitipdoc == "Pasaporte" ? 'selected' : '' }}>Pasaporte</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Número de documento</label>
                                        <input type="number" class="form-control" name="sinumdoc" value="{{$semillero->sinumdoc}}">
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
                                            <input type="text" class="form-control" name="sifecexp" value="{{$semillero->sifecexp}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Municipio de expedición</label>
                                        <input type="text" class="form-control" name="simunexp" value="{{$semillero->simunexp}}">
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
                                        <input type="text" class="form-control" name="sifecnac" value="{{$semillero->sifecnac}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Correo personal</label>
                                        <input type="email" class="form-control" name="sicorper" id="sicorper" value="{{$semillero->sicorper}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Correo SENA o MiSENA</label>
                                        <input type="email" class="form-control" name="sicorsen" id="sicorsen" value="{{$semillero->sicorsen}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Rol SENNOVA</label>
                                        <select class="custom-select form-control" name="sirolsen" id="sirolsen">
                                            <option selected value="">{{__('seleccione')}}</option>
                                            <option value="Aprendiz en grupo de investigación" {{ $semillero->sirolsen == "Aprendiz en grupo de investigación" ? 'selected' : '' }}>Aprendiz en grupo de investigación</option>
                                            <option value="Aprendiz en semillero" {{ $semillero->sirolsen == "Aprendiz en semillero" ? 'selected' : '' }}>Aprendiz en semillero</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Tipo de vinculación</label>
                                        <input type="text" class="form-control" name="sitipvin" value="{{$semillero->sitipvin}}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Último grado de formación recibido</label>
                                        <select class="custom-select form-control" name="sigrafor" id="sigrafor">
                                            <option selected value="">{{__('seleccione')}}</option>
                                            <option value="Primaria" {{ $semillero->sigrafor == "Primaria" ? 'selected' : '' }}>Primaria</option>
                                            <option value="Bachillerato" {{ $semillero->sigrafor == "Bachillerato" ? 'selected' : '' }}>Bachillerato</option>
                                            <option value="Operario o auxiliar" {{ $semillero->sigrafor == "Operario o auxiliar" ? 'selected' : '' }}>Operario o auxiliar</option>
                                            <option value="Técnico" {{ $semillero->sigrafor == "Técnico" ? 'selected' : '' }}>Técnico</option>
                                            <option value="Tecnólogo " {{ $semillero->sigrafor == "Tecnólogo " ? 'selected' : '' }}>Tecnólogo</option>
                                            <option value="Pregrado universitario" {{ $semillero->sigrafor == "Pregrado universitario" ? 'selected' : '' }}>Pregrado universitario</option>
                                            <option value="Posgrado especialización" {{ $semillero->sigrafor == "Posgrado especialización" ? 'selected' : '' }}>Posgrado especialización</option>
                                            <option value="Posgrado maestria" {{ $semillero->sigrafor == "Posgrado maestria" ? 'selected' : '' }}>Posgrado maestria</option>
                                            <option value="Posgrado doctorado" {{ $semillero->sigrafor == "Posgrado doctorado" ? 'selected' : '' }}>Posgrado doctorado</option>
                                            <option value="Post - doctorado" {{ $semillero->sigrafor == "Post - doctorado" ? 'selected' : '' }}>Post - doctorado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nombre del último titulo obtenido</label>
                                        <input type="text" class="form-control" name="sititulo" id="sititulo" value="{{$semillero->sititulo}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Profesión</label>
                                        <input type="text" class="form-control" name="siprofes" id="siprofes" value="{{$semillero->siprofes}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nivel de inglés</label>
                                        <select class="custom-select form-control" name="siniving" id="siniving">
                                            <option selected value="">{{__('seleccione')}}</option>
                                            <option value="Ninguno" {{ $semillero->siniving == "Ninguno" ? 'selected' : '' }}>Ninguno</option>
                                            <option value="A1" {{ $semillero->siniving == "A1" ? 'selected' : '' }}>A1</option>
                                            <option value="A2" {{ $semillero->siniving == "A2" ? 'selected' : '' }}>A2</option>
                                            <option value="B1" {{ $semillero->siniving == "B1" ? 'selected' : '' }}>B1</option>
                                            <option value="B2" {{ $semillero->siniving == "B2" ? 'selected' : '' }}>B2</option>
                                            <option value="C1" {{ $semillero->siniving == "C1" ? 'selected' : '' }}>C1</option>
                                            <option value="C2" {{ $semillero->siniving == "C2" ? 'selected' : '' }}>C2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Teléfono celular</label>
                                        <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' name="sinumcel" id="sinumcel" value="{{$semillero->sinumcel}}" data-mask>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Teléfono fijo</label>
                                        <input type="text" class="form-control" data-inputmask='"mask": "(9) 999-9999"' name="sitelfij" id="sitelfij" value="{{$semillero->sitelfij}}" data-mask>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Número de IP</label>
                                        <input type="text" class="form-control" name="sinumeip" id="sinumeip" value="{{$semillero->sinumeip}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Titulación</label>
                                        <input type="text" class="form-control" name="sititula" id="sititula" value="{{$semillero->sititula}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Número de ficha</label>
                                        <input type="number" class="form-control" name="sinumfic" id="sinumfic" value="{{$semillero->sinumfic}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Instructor</label>
                                        <input type="text" class="form-control" name="siinstru" id="siinstru" value="{{$semillero->siinstru}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Ambiente de formación</label>
                                        <input type="text" class="form-control" name="siambfor" id="siambfor" value="{{$semillero->siambfor}}">
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
                                            <input type="text" class="form-control" name="siterlec" value="{{$semillero->siterlec}}">
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
                                            <input type="text" class="form-control" name="siterpro" value="{{$semillero->siterpro}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Antigüedad en el SENA en meses</label>
                                        <input type="number" class="form-control" name="siantsen" value="{{$semillero->siantsen}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Área de conocimiento en que se desempeña</label>
                                        <select class="custom-select form-control" name="siarecon" id="siarecon">
                                            <option selected value="">{{__('seleccione')}}</option>
                                            <option value="Arte" {{ $semillero->siarecon == "Arte" ? 'selected' : '' }}>Arte</option>
                                            <option value="Biología" {{ $semillero->siarecon == "Biología" ? 'selected' : '' }}>Biología</option>
                                            <option value="Ciencias biológicas" {{ $semillero->siarecon == "Ciencias biológicas" ? 'selected' : '' }}>Ciencias biológicas</option>
                                            <option value="Ciencias de la educación" {{ $semillero->siarecon == "Ciencias de la educación" ? 'selected' : '' }}>Ciencias de la educación</option>
                                            <option value="Ciencias de la información" {{ $semillero->siarecon == "Ciencias de la información" ? 'selected' : '' }}>Ciencias de la información</option>
                                            <option value="Ciencias de la salud" {{ $semillero->siarecon == "Ciencias de la salud" ? 'selected' : '' }}>Ciencias de la salud</option>
                                            <option value="Ciencias de la tierra y del espacio" {{ $semillero->siarecon == "Ciencias de la tierra y del espacio" ? 'selected' : '' }}>Ciencias de la tierra y del espacio</option>
                                            <option value="Ciencias del espiritu" {{ $semillero->siarecon == "Ciencias del espiritu" ? 'selected' : '' }}>Ciencias del espiritu</option>
                                            <option value="Ciencias del hombre" {{ $semillero->siarecon == "Ciencias del hombre" ? 'selected' : '' }}>Ciencias del hombre</option>
                                            <option value="Ciencias del lenguaje" {{ $semillero->siarecon == "Ciencias del lenguaje" ? 'selected' : '' }}>Ciencias del lenguaje</option>
                                            <option value="Filosofía" {{ $semillero->siarecon == "Filosofía" ? 'selected' : '' }}>Filosofía</option>
                                            <option value="Física" {{ $semillero->siarecon == "Física" ? 'selected' : '' }}>Física</option>
                                            <option value="Ingeniería" {{ $semillero->siarecon == "Ingeniería" ? 'selected' : '' }}>Ingeniería</option>
                                            <option value="Matemáticas" {{ $semillero->siarecon == "Matemáticas" ? 'selected' : '' }}>Matemáticas</option>
                                            <option value="Química" {{ $semillero->siarecon == "Química" ? 'selected' : '' }}>Química</option>
                                            <option value="Ninguna de las anteriores" {{ $semillero->siarecon == "Ninguna de las anteriores" ? 'selected' : '' }}>Ninguna de las anteriores</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Grupo de investigación vinculado</label>
                                        <select class="custom-select form-control" name="sigruinv" id="sigruinv">
                                            <option value="">{{__('seleccione')}}</option>
                                            @foreach ($grupos as $item)
                                                <option value="{{$item->id}}" {{$semillero->sigruinv == $item->id ? 'selected' : '' }}>{{$item->ginombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Semillero de investigación vinculado</label>
                                        <select class="custom-select form-control" name="sisemill" id="sisemill" value="{{$semillero->sisemill}}">
                                            <option selected value="">{{__('seleccione')}}</option>
                                            @foreach ($semilleros as $item)
                                                <option value="{{$item->id}}" {{$semillero->sisemill == $item->id ? 'selected' : '' }}>{{$item->senombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Proyecto vinculado</label>
                                <select class="custom-select form-control" name="siproyec" id="siproyec">
                                    <option selected value="">{{__('seleccione')}}</option>
                                    @foreach ($proyectos as $item)
                                        <option value="{{$item->id}}" {{$semillero->siproyec == $item->id ? 'selected' : '' }}>{{$item->pinompro}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Vinculación a un proyecto RedColSI</label>
                                        <input type="text" class="form-control" name="siprored" value="{{$semillero->siprored}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Participación RedColSI</label>
                                        <select class="custom-select form-control" name="siparred" id="siparred">
                                            <option selected value="">{{__('seleccione')}}</option>
                                            <option value="Si" {{ $semillero->siparred == "Si" ? 'selected' : '' }}>Si</option>
                                            <option value="No" {{ $semillero->siparred == "No" ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Formulación de proyecto</label>
                                        <select class="custom-select form-control" name="siforpro" id="siforpro">
                                            <option selected value="">{{__('seleccione')}}</option>
                                            <option value="Si" {{ $semillero->siforpro == "Si" ? 'selected' : '' }}>Si</option>
                                            <option value="No" {{ $semillero->siforpro == "No" ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Curso de Investigación a realizar</label>
                                        <select class="custom-select form-control" name="sicurinv" id="sicurinv">
                                            <option selected value="">{{__('seleccione')}}</option>
                                            <option value="Si" {{ $semillero->sicurinv == "Si" ? 'selected' : '' }}>Si</option>
                                            <option value="No" {{ $semillero->sicurinv == "No" ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Capacitación en investigación</label>
                                        @foreach ($capacitaciones as $item)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{$item->id}}" id="{{$item->id}}" name="sicapa{{$item->id}}" 
                                                    @foreach ($capaSemillero as $item2)
                                                        @if ($item2->dccapaci == $item->id)
                                                            checked
                                                        @endif
                                                    @endforeach
                                                >
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
        $('#sinumcel').inputmask();
        $('#sitelfij').inputmask();
    </script>
@endsection