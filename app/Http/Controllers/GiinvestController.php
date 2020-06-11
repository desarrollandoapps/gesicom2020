<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GiinvestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investigadores = App\Giinvest::join('giregion', 'giinvest.inregion', 'giregion.id')
                                        ->join('gicenfor', 'giinvest.incenfor', 'gicenfor.id')
                                        ->join('gigruinv', 'giinvest.ingruinv', 'gigruinv.id')
                                        ->select('giinvest.*', 'giregion.renombre as regional', 'gicenfor.cfnombre as centro', 'gigruinv.ginombre as grupo')
                                        ->orderBy('innombre', 'asc')->get();

        return view('giinvest.index', compact( 'investigadores' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regionales = App\Giregion::orderby('renombre', 'asc')->pluck('renombre', 'id')->all();
        $centros = App\Gicenfor::orderby('cfnombre', 'asc')->pluck('cfnombre', 'id')->all();
        $grupos = App\Gigruinv::orderby('ginombre', 'asc')->pluck('ginombre', 'id')->all();
        $lineas = App\Gilininv::orderby('lideslin', 'asc')->pluck('lideslin', 'id')->all();
        $semilleros = App\Gisemill::orderby('senombre', 'asc')->pluck('senombre', 'id')->all();
        $roles = [
            'Líder Sennova', 
            'Líder de grupo de investigación', 
            'Líder de semillero de investigación',
            'Investigador en grupo de investigación',
            'Aprendiz en grupo de investigación',
            'Aprendiz en semilleros',
            'Instructor investigador en semillero',
            'Gestor SENNOVA',
            'Asesor SENNOVA DG',
            'Otro'
        ];
        $vinculaciones = ['Planta', 'Planta temporal', 'Contratista'];
        $cargos = ['Instructor', 'Asesor', 'Profesional', 'Técnico', 'No aplica'];
        $grados = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', 'No aplica'];

        return view('giinvest.insert', compact('regionales', 'centros','grupos', 'lineas', 
                                                'semilleros', 'roles', 'vinculaciones', 'cargos', 
                                                'grados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //mensajes de error
        $mensajes = [
            'innombre.required' => 'Debe ingresar el nombre.',
            'intipdoc.required' => 'Debe seleccionar el tipo de documento.',
            'innumdoc.required' => 'Debe ingresar el número del documento.',
            'innumdoc.unique' => 'Ya exite un investigador con este número de identificación.',
            'infecexp.required' => 'Debe ingresar la fecha de expedición del documento.',
            'inmunexp.required' => 'Debe ingresar el municipio de expedición del documento.',
            'infecnac.required' => 'Debe ingresar la fecha de nacimiento.',
            'incorper.required' => 'Debe ingresar el correo electrónico personal.',
            'incorper.email' => 'Debe ingresar una dirección de correo personal válida.',
            'incorsen.required' => 'Debe ingresar el correo electrónico SENA.',
            'incorsen.email' => 'Debe ingresar una dirección de correo SENA válida.',
            'innumcel.required' => 'Debe ingresar el número de celular.',
            'ingrafor.required' => 'Debe seleccionar el último grado de formación recibido.',
            'intitulo.required' => 'Debe ingresar el título.',
            'inprofes.required' => 'Debe ingresar la profesión.',
            'inniving.required' => 'Debe seleccionar el nivel de inglés.',
            'inregion.required' => 'Debe seleccionar la regional.',
            'incenfor.required' => 'Debe seleccionar el centro de cormación.',
            'ingruinv.required' => 'Debe seleccionar el grupo de investigación.',
            'inlininv.required' => 'Debe seleccionar la línea de investigación.',
            'inrolsen.required' => 'Debe seleccionar el rol en SENNOVA.',
            'intipvin.required' => 'Debe ingresar el tipo de vinculación.',
            'inporded.required' => 'Debe ingresar el porcentaje de dedicación al grupo',
            'inantsen.required' => 'Debe ingresar la antigüedad en el SENA.',
            'inprofor.required' => 'Debe ingresar el programa de formación (No aplica en caso contrario).',
            'inarecon.required' => 'Debe seleccionar el área de conocimiento.',
            'incarinv.required' => 'Debe seleccionar un cargo.',
            'innumgra.required' => 'Debe seleccionar el grado.',
            'insemill.required' => 'Debe seleccionar el semillero de investigación.',
            'inasimen.required' => 'Debe ingresar la asignación mensual.',
            'innumcon.required' => 'Debe ingresar el número de contrato (No aplica en caso contrario).',
            'inestcon.required' => 'Debe seleccionar si está contratado.',
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'innombre' => 'required',
            'intipdoc' => 'required',
            'innumdoc' =>'required|unique:giinvest', 
            'infecexp' => 'required',
            'inmunexp' => 'required',
            'infecnac' => 'required',
            'incorper' => 'required|email:rfc,dns',
            'incorsen' => 'required|email:rfc,dns',
            'innumcel' => 'required',
            'ingrafor' => 'required',
            'intitulo' => 'required',
            'inprofes' => 'required',
            'inniving' => 'required',
            'inregion' => 'required',
            'incenfor' => 'required',
            'ingruinv' => 'required',
            'inlininv' => 'required',
            'insemill' => 'required',
            'inrolsen' => 'required',
            'intipvin' => 'required',
            'incarinv' => 'required',
            'innumgra' => 'required',
            'inporded' => 'required',
            'inantsen' => 'required',
            'inprofor' => 'required',
            'inarecon' => 'required',
            'inasimen' => 'required',
            'innumcon' => 'required',
            'inestcon' => 'required'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('giinvest/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        App\Giinvest::create( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'giinvest.index' )
                         ->with( 'exito', 'Investigador creado con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Giinvest  $giinvest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = [
            'Líder Sennova', 
            'Líder de grupo de investigación', 
            'Líder de semillero de investigación',
            'Investigador en grupo de investigación',
            'Aprendiz en grupo de investigación',
            'Aprendiz en semilleros',
            'Instructor investigador en semillero',
            'Gestor SENNOVA',
            'Asesor SENNOVA DG',
            'Otro'
        ];
        $vinculaciones = ['Planta', 'Planta temporal', 'Contratista'];
        $cargos = ['Instructor', 'Asesor', 'Profesional', 'Técnico', 'No aplica'];
        $grados = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', 'No aplica'];

        $investigador = App\Giinvest::join('giregion', 'giinvest.inregion', 'giregion.id')
                                        ->join('gicenfor', 'giinvest.incenfor', 'gicenfor.id')
                                        ->join('gigruinv', 'giinvest.ingruinv', 'gigruinv.id')
                                        ->join('gilininv', 'giinvest.ingruinv', 'gigruinv.id')
                                        ->join('gisemill', 'giinvest.insemill', 'gisemill.id')
                                        ->select('giinvest.*', 'giregion.renombre as regional', 'gicenfor.cfnombre as centro', 
                                        'gigruinv.ginombre as grupo', 'gilininv.lideslin as linea', 'gisemill.senombre as semillero')
                                        ->where('giinvest.id', $id)
                                        ->orderBy('innombre', 'asc')
                                        ->first();

        $rol = $roles[$investigador->inrolsen];
        $vinculacion = $vinculaciones[$investigador->intipvin];
        $cargo = $cargos[$investigador->incarinv];
        $grado = $grados[$investigador->innumgra];
        return view('giinvest.view', compact('investigador', 'rol', 'cargo', 'grado', 'vinculacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Giinvest  $giinvest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regionales = App\Giregion::orderby('renombre', 'asc')->pluck('renombre', 'id')->all();
        $centros = App\Gicenfor::orderby('cfnombre', 'asc')->pluck('cfnombre', 'id')->all();
        $grupos = App\Gigruinv::orderby('ginombre', 'asc')->pluck('ginombre', 'id')->all();
        $lineas = App\Gilininv::orderby('lideslin', 'asc')->pluck('lideslin', 'id')->all();
        $semilleros = App\Gisemill::orderby('senombre', 'asc')->pluck('senombre', 'id')->all();
        $roles = [
            'Líder Sennova', 
            'Líder de grupo de investigación', 
            'Líder de semillero de investigación',
            'Investigador en grupo de investigación',
            'Aprendiz en grupo de investigación',
            'Aprendiz en semilleros',
            'Instructor investigador en semillero',
            'Gestor SENNOVA',
            'Asesor SENNOVA DG',
            'Otro'
        ];
        $vinculaciones = ['Planta', 'Planta temporal', 'Contratista'];
        $cargos = ['Instructor', 'Asesor', 'Profesional', 'Técnico', 'No aplica'];
        $grados = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', 'No aplica'];
        $investigador = App\Giinvest::join('giregion', 'giinvest.inregion', 'giregion.id')
                                        ->join('gicenfor', 'giinvest.incenfor', 'gicenfor.id')
                                        ->join('gigruinv', 'giinvest.ingruinv', 'gigruinv.id')
                                        ->join('gilininv', 'giinvest.ingruinv', 'gigruinv.id')
                                        ->join('gisemill', 'giinvest.insemill', 'gisemill.id')
                                        ->select('giinvest.*', 'giregion.renombre as regional', 'gicenfor.cfnombre as centro', 
                                        'gigruinv.ginombre as grupo', 'gilininv.lideslin as linea', 'gisemill.senombre as semillero')
                                        ->where('giinvest.id', $id)
                                        ->orderBy('innombre', 'asc')
                                        ->first();
        return view('giinvest.edit', compact('investigador', 'regionales', 'centros','grupos', 'lineas', 
                                                'semilleros', 'roles', 'vinculaciones', 'cargos', 
                                                'grados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Giinvest  $giinvest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Giinvest $giinvest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Giinvest  $giinvest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Giinvest $giinvest)
    {
        //
    }
}
