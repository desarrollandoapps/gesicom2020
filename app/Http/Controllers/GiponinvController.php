<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GiponinvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ponencias = App\Giponinv::orderBy('pititulo', 'asc')->get();
        return view('giponinv.index', compact('ponencias'));
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
        $proyectos = App\Giproinv::orderby('pinompro', 'asc')->pluck('pinompro', 'id')->all();
        $tiposPonencia = App\Gitippon::orderby('tpnomtip', 'asc')->pluck('tpnomtip', 'id')->all();

        return view('giponinv.insert', compact('regionales', 'centros','grupos', 'lineas', 'proyectos', 'tiposPonencia'));
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
            'pititulo.required' => 'Debe ingresar el nombre de la ponencia.',
            'pititulo.unique' => 'Ya hay una ponencia con el nombre que intenta asignar.',
            'pievento.required' => 'Debe ingresar el nombre del evento.',
            'pifecini.required' => 'Debe seleccionar la fecha de inicio del evento .',
            'pifecfin.required' => 'Debe seleccionar la fecha de fin del evento.',
            'pifecpon.required' => 'Debe seleccionar la fecha de presentación de la ponencia.',
            'piciudad.required' => 'Debe ingresar la ciudad.',
            'piambito.required' => 'Debe seleccionar el ámbito.',
            'piprovin.required' => 'Debe seleccionar el proyecto.',
            'pilinvin.required' => 'Debe seleccionar la línea de investigación principal.',
            'picodtip.required' => 'Debe seleccionar el tipo de ponencia.',
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'pilinvin' => 'required',
            'picodtip' => 'required',
            'piprovin' => 'required',
            'pititulo' => 'required|unique:giponinv',
            'pievento' => 'required',
            'pifecini' => 'required',
            'pifecfin' => 'required',
            'pifecpon' => 'required',
            'piciudad' => 'required',
            'piambito' => 'required',
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('giponinv/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Se toma el modelo
        App\Giponinv::create( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'giponinv.index' )
                         ->with( 'exito', 'Ponencia creada con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gitracon  $gitracon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ponencia = App\Giponinv::join('giproinv', 'giponinv.piprovin', 'giproinv.id')
                                    ->join('gilininv', 'giponinv.pilinvin', 'gilininv.id')
                                    ->join('gitippon', 'giponinv.picodtip', 'gitippon.id')
                                    ->select('giponinv.*', 'giproinv.pinompro as proyecto', 'gilininv.lideslin as linea', 'gitippon.tpnomtip as tipo')
                                    ->where('giponinv.id', $id)
                                    ->first();
        $autores = App\Giinvest::join('gidepoau', 'giinvest.id', 'gidepoau.dpinvest')
                                    ->join('giponinv', 'gidepoau.dpponinv', 'giponinv.id')
                                    ->select('giinvest.*')
                                    ->where('giponinv.id', $id)
                                    ->get();
        return view('giponinv.view', compact('ponencia', 'autores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gitracon  $gitracon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regionales = App\Giregion::orderby('renombre', 'asc')->pluck('renombre', 'id')->all();
        $centros = App\Gicenfor::orderby('cfnombre', 'asc')->pluck('cfnombre', 'id')->all();
        $grupos = App\Gigruinv::orderby('ginombre', 'asc')->pluck('ginombre', 'id')->all();
        $lineas = App\Gilininv::orderby('lideslin', 'asc')->pluck('lideslin', 'id')->all();
        $proyectos = App\Giproinv::orderby('pinompro', 'asc')->pluck('pinompro', 'id')->all();
        $tiposPonencia = App\Gitippon::orderby('tpnomtip', 'asc')->pluck('tpnomtip', 'id')->all();

        $ponencia = App\Giponinv::join('giproinv', 'giponinv.piprovin', 'giproinv.id')
                                    ->join('gilininv', 'giponinv.pilinvin', 'gilininv.id')
                                    ->join('gitippon', 'giponinv.picodtip', 'gitippon.id')
                                    ->select('giponinv.*', 'giproinv.pinompro as proyecto', 'gilininv.lideslin as linea', 'gitippon.tpnomtip as tipo')
                                    ->where('giponinv.id', $id)
                                    ->first();
        
        return view('giponinv.edit', compact('ponencia', 'regionales', 'centros','grupos', 'lineas',
                                    'proyectos', 'tiposPonencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gitracon  $gitracon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mensajes de error
        $mensajes = [
            'pititulo.required' => 'Debe ingresar el nombre de la ponencia.',
            'pievento.required' => 'Debe ingresar el nombre del evento.',
            'pifecini.required' => 'Debe seleccionar la fecha de inicio del evento .',
            'pifecfin.required' => 'Debe seleccionar la fecha de fin del evento.',
            'pifecpon.required' => 'Debe seleccionar la fecha de presentación de la ponencia.',
            'piciudad.required' => 'Debe ingresar la ciudad.',
            'piambito.required' => 'Debe seleccionar el ámbito.',
            'piprovin.required' => 'Debe seleccionar el proyecto.',
            'pilinvin.required' => 'Debe seleccionar la línea de investigación principal.',
            'picodtip.required' => 'Debe seleccionar el tipo de ponencia.',
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'pilinvin' => 'required',
            'picodtip' => 'required',
            'piprovin' => 'required',
            'pititulo' => 'required',
            'pievento' => 'required',
            'pifecini' => 'required',
            'pifecfin' => 'required',
            'pifecpon' => 'required',
            'piciudad' => 'required',
            'piambito' => 'required',
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('giponinv/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $ponencia = App\Giponinv::findorfail($id);
        $ponencia->update($request->all());

        return redirect()->route( 'giponinv.index' )
                         ->with( 'exito', 'Ponencia modificada con éxito' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gitracon  $gitracon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ponencia = App\Giponinv::findorfail($id);
        $ponencia->delete();

        return redirect()->route( 'giponinv.index' )
                         ->with( 'exito', 'ponencia eliminada con éxito' );
    }
}
