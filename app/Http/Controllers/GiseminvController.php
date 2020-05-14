<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class GiseminvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semilleros = App\Giseminv::orderBy('sinombre', 'asc')->get();
        return view('giseminv.index', compact( 'semilleros' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $capacitaciones = App\Gicapsem::orderby('csnombre', 'asc')->get();
        $semilleros = App\Gisemill::orderby('senombre', 'asc')->get();
        $grupos = App\Gigruinv::orderby('ginombre', 'asc')->get();
        $proyectos = App\Giproinv::orderby('pinompro', 'asc')->get();
        return view('giseminv.insert', compact('capacitaciones', 'grupos', 'proyectos', 'semilleros'));
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
            'sinombre.required' => 'Debe ingresar el nombre.',
            'sinumdoc.required' => 'Debe ingresar el número de documento.',
            'sinumdoc.unique' => 'Ya exite un semillero con este número de identificación.',
            'sicorper.required' => 'Debe ingresar el correo electrónico personal.',
            'sicorper.email' => 'Debe ingresar una dirección de correo personal válida.',
            'sicorsen.required' => 'Debe ingresar el correo electrónico SENA.',
            'sicorsen.email' => 'Debe ingresar una dirección de correo sena válida.',
            'sitipdoc.required' => 'Debe seleccionar el tipo de documento.',
            'sinumdoc.required' => 'Debe ingresar el número del documento.',
            'sifecexp.required' => 'Debe ingresar la fecha de expedición del documento.',
            'simunexp.required' => 'Debe ingresar el municipio de expedición del documento.',
            'sifecnac.required' => 'Debe ingresar la fecha de nacimiento.',
            'sirolsen.required' => 'Debe seleccionar el rol en SENNOVA.',
            'sitipvin.required' => 'Debe ingresar el tipo de vinculación.',
            'sigrafor.required' => 'Debe seleccionar el último grado de formación recibido.',
            'sititulo.required' => 'Debe ingresar el título.',
            'siprofes.required' => 'Debe ingresar la profesión.',
            'sicering.required' => 'Debe seleccionar el nivel de inglés.',
            'sinumcel.required' => 'Debe ingresar el número de celular.',
            'sititula.required' => 'Debe ingresar la titulación.',
            'sinumfic.required' => 'Debe ingresar el número de ficha.',
            'siinstru.required' => 'Debe ingresar el nombre del instructor.',
            'siambfor.required' => 'Debe ingresar el ambiente de formación.',
            'siterlec.required' => 'Debe ingresar la fecha de terminación de etapa lectiva.',
            'siterpro.required' => 'Debe ingresar la fecha de terminación de etapa productiva.',
            'siantsen.required' => 'Debe ingresar la antigüedad en el SENA.',
            'siarecon.required' => 'Debe seleccionar el área de conocimiento.',
            'sigruinv.required' => 'Debe seleccionar un grupo de investigación.',
            'sisemill.required' => 'Debe seleccionar un semillero de investigación.',
            'siproyec.required' => 'Debe seleccionar un proyecto.',
            'siprored.required' => 'Debe seleccionar la vinculación a un proyecto RedColSI.',
            'siparred.required' => 'Debe seleccionar la participación en RedColSI.',
            'sicurinv.required' => 'Debe seleccionar si debe realizar el curso de investigación.',
            'siforpro.required' => 'Debe seleccionar si ha formulado un proyecto.'
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'sinombre' =>'required',
            'sitipdoc' =>'required',
            'sinumdoc' =>'required|unique:giseminv', 
            'sifecexp' =>'required',
            'simunexp' =>'required',
            'sifecnac' =>'required',
            'sicorper' => 'required|email:rfc,dns',
            'sicorsen' => 'required|email:rfc,dns',
            'sirolsen' =>'required',
            'sitipvin' =>'required',
            'sigrafor' =>'required',
            'sititulo' =>'required',
            'siprofes' =>'required',
            'sicering' =>'required',
            'sinumcel' =>'required',
            'sitelfij' =>'required',
            'sinumeip' =>'required',
            'sititula' =>'required',
            'sinumfic' =>'required',
            'siinstru' =>'required',
            'siambfor' =>'required',
            'siterlec' =>'required',
            'siterpro' =>'required',
            'siantsen' =>'required',
            'siarecon' =>'required',
            'sigruinv' =>'required',
            'sisemill' =>'required',
            'siproyec' =>'required',
            'siprored' =>'required',
            'siparred' =>'required',
            'sicurinv' =>'required',
            'siforpro' =>'required',
            'sicapaci' =>'required'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('giseminv/create')
                        ->withErrors($validator)
                        ->withInput();
        }


        // Se crea el registro del semillero
        $semillero = App\Giseminv::create([
            'sinombre' => $request->get('sinombre'),
            'sitipdoc' => $request->get('sitipdoc'),
            'sinumdoc' => $request->get('sinumdoc'),
            'sifecexp' => $request->get('sifecexp'),
            'simunexp' => $request->get('simunexp'),
            'sirolsen' => $request->get('sirolsen'),
            'siprofes' => $request->get('siprofes'),
            'sicorper' => $request->get('sicorper'),
            'sicorsen' => $request->get('sicorsen'),
            'sinumcel' => $request->get('sinumcel'),
            'sitelfij' => $request->get('sitelfij'),
            'sinumeip' => $request->get('sinumeip'),
            'sifecnac' => $request->get('sifecnac'),
            'sitipvin' => $request->get('sitipvin'),
            'siantsen' => $request->get('siantsen'),
            'sigrafor' => $request->get('sigrafor'),
            'sititulo' => $request->get('sititulo'),
            'siniving' => $request->get('siniving'),
            'siproyec' => $request->get('siproyec'),
            'siarecon' => $request->get('siarecon'),
            'sicering' => $request->get('sicering'),
            'sititula' => $request->get('sititula'),
            'sinumfic' => $request->get('sinumfic'),
            'siinstru' => $request->get('siinstru'),
            'siterlec' => $request->get('siterlec'),
            'siterpro' => $request->get('siterpro'),
            'siambfor' => $request->get('siambfor'),
            'siprored' => $request->get('siprored'),
            'siparred' => $request->get('siparred'),
            'sicurinv' => $request->get('sicurinv'),
            'siforpro' => $request->get('siforpro'),
            'sigruinv' => $request->get('sigruinv'),
            'sisemill' => $request->get('sisemill')
        ]);
        
        //Obtener las capacitaciones
        $totalCap = DB::table('gicapsem')
                     ->select(DB::raw('count(*) as total'))
                     ->get();

        $capacitaciones = [];
        $numCap =$totalCap[0]->total;
        for ($i=1; $i <= $numCap; $i++) {
            $capacitaciones[$i] = $request->get('sicapa' . $i);
            //Se crea el registro del detalle de las capacitaciones del semillero
            if ($capacitaciones[$i] <> null)
            {
                App\Gicapsem::create([
                    'dcsemill' => $semillero->id,
                    'dccapaci' => $capacitaciones[$i]
                ]);
            }
        }

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'giseminv.index' )
                         ->with( 'exito', 'Semillero de investigación creado con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Giseminv  $giseminv
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Giseminv  $giseminv
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Giseminv  $giseminv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Giseminv  $giseminv
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
