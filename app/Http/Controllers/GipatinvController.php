<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GipatinvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patentes = App\Gipatinv::orderBy('pititobr', 'asc')->get();
        return view('gipatinv.index', compact('patentes'));
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
        $proyectos = App\Giproinv::orderby('pinompro', 'asc')->pluck('pinompro', 'id')->all();
        $tiposPatente = App\Gitippat::orderby('tpnomtip', 'asc')->pluck('tpnomtip', 'id')->all();

        return view('gipatinv.insert', compact('regionales', 'centros', 'grupos', 'proyectos', 'tiposPatente'));
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
            'pinumrad.required' => 'Debe ingresar el número del radicado de la patente.',
            'pinumrad.unique' => 'Ya hay una patente con el número de radicado que intenta asignar.',
            'pifecsol.required' => 'Debe seleccionar la fecha de la solicitud de la patente.',
            'pititobr.required' => 'Debe ingresar el título de la obra de la patente.',
            'piprovin.required' => 'Debe seleccionar el proyecto.',
            'picodtip.required' => 'Debe seleccionar el tipo de patente.'
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'piprovin' => 'required',
            'piprovin' => 'required',
            'pinumrad' => 'required|unique:gipatinv',
            'pifecsol' => 'required',
            'pititobr' => 'required'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('gipatinv/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Se toma el modelo
        App\Gipatinv::create( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'gipatinv.index' )
                         ->with( 'exito', 'Patente creada con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gipatinv  $gipatinv
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patente = App\Gipatinv::join('giproinv', 'gipatinv.piprovin', 'giproinv.id')
                                    ->join('gitippat', 'gipatinv.picodtip', 'gitippat.id')
                                    ->select('gipatinv.*', 'giproinv.pinompro as proyecto', 'gitippat.tpnomtip as tipo')
                                    ->where('gipatinv.id', $id)
                                    ->first();

        $autores = App\Giinvest::join('gidepaau', 'giinvest.id', 'gidepaau.dpinvest')
                                    ->join('gipatinv', 'gidepaau.dppatinv', 'gipatinv.id')
                                    ->select('giinvest.*')
                                    ->where('gipatinv.id', $id)
                                    ->get();
        return view('gipatinv.view', compact('patente', 'autores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gipatinv  $gipatinv
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regionales = App\Giregion::orderby('renombre', 'asc')->pluck('renombre', 'id')->all();
        $centros = App\Gicenfor::orderby('cfnombre', 'asc')->pluck('cfnombre', 'id')->all();
        $grupos = App\Gigruinv::orderby('ginombre', 'asc')->pluck('ginombre', 'id')->all();
        $proyectos = App\Giproinv::orderby('pinompro', 'asc')->pluck('pinompro', 'id')->all();
        $tiposPatente = App\Gitippat::orderby('tpnomtip', 'asc')->pluck('tpnomtip', 'id')->all();

        $patente = App\Gipatinv::join('giproinv', 'gipatinv.piprovin', 'giproinv.id')
                                    ->join('gitippat', 'gipatinv.picodtip', 'gitippat.id')
                                    ->select('gipatinv.*', 'giproinv.pinompro as proyecto', 'gitippat.tpnomtip as tipo')
                                    ->where('gipatinv.id', $id)
                                    ->first();

        return view('gipatinv.edit', compact('patente', 'regionales', 'centros', 'grupos',
                                    'proyectos', 'tiposPatente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gipatinv  $gipatinv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mensajes de error
        $mensajes = [
            'pinumrad.required' => 'Debe ingresar el número del radicado de la patente.',
            'pifecsol.required' => 'Debe seleccionar la fecha de la solicitud de la patente.',
            'pititobr.required' => 'Debe ingresar el título de la obra de la patente.',
            'pinumreg.required' => 'Debe ingresar el número de registro de la patente.',
            'piprovin.required' => 'Debe seleccionar el proyecto.',
            'picodtip.required' => 'Debe seleccionar el tipo de patente.'
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'piprovin' => 'required',
            'piprovin' => 'required',
            'pinumrad' => 'required',
            'pifecsol' => 'required',
            'pititobr' => 'required',
            'pinumreg' => 'required'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('gipatinv/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $patente = App\Gipatinv::findorfail($id);
        $patente->update($request->all());

        return redirect()->route( 'gipatinv.index' )
                         ->with( 'exito', 'Patente modificada con éxito' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gipatinv  $gipatinv
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patente = App\Gipatinv::findorfail($id);
        $patente->delete();

        return redirect()->route( 'gipatinv.index' )
                         ->with( 'exito', 'Patente eliminada con éxito' );
    }
}
