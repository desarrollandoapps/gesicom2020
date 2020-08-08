<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GisofinvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->buscar;
        $softwares = App\Gisofinv::where('sititobr', 'LIKE', '%' . $query . '%')
                                ->orderby( 'sititobr', 'asc' )
                                ->get();

        return view('gisofinv.index', compact('softwares'));
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

        return view('gisofinv.insert', compact('regionales', 'centros','grupos', 'proyectos'));
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
            'sinumrad.required' => 'Debe ingresar el número de radicación.',
            'sinumrad.unique' => 'Ya hay un software con el número de radicado que intenta asignar.',
            'sititobr.required' => 'Debe ingresar el título de la obra.',
            'siprovin.required' => 'Debe seleccionar el proyecto vinculado.',
            'sifecrad.required' => 'Debe seleccionar la fecha de radicación.',
            'siesttra.required' => 'Debe seleccionar el estado del trámite.'
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'siprovin' => 'required',
            'sititobr' => 'required',
            'sinumrad' => 'required|unique:gisofinv',
            'sifecrad' => 'required',
            'siesttra' => 'required'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('gisofinv/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Se toma el modelo
        App\Gisofinv::create( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'gisofinv.index' )
                         ->with( 'exito', 'Software creado con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gisofinv  $gisofinv
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $software = App\Gisofinv::join('giproinv', 'gisofinv.siprovin', 'giproinv.id')
                                    ->join('gigruinv', 'giproinv.pigruinv', 'gigruinv.id')
                                    ->join('gicenfor', 'gigruinv.gicenfor', 'gicenfor.id')
                                    ->join('giregion', 'gicenfor.cfregion', 'giregion.id')
                                    ->select('gisofinv.*', 'giproinv.pinompro as proyecto', 'gigruinv.ginombre as grupo',
                                    'gicenfor.cfnombre as centro', 'giregion.renombre as regional')
                                    ->where('gisofinv.id', $id)
                                    ->first();
        $autores = App\Giinvest::join('gidesoau', 'giinvest.id', 'gidesoau.dsinvest')
                                    ->join('gisofinv', 'gidesoau.dssofinv', 'gisofinv.id')
                                    ->select('giinvest.*')
                                    ->where('gisofinv.id', $id)
                                    ->get();
        return view('gisofinv.view', compact('software', 'autores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gisofinv  $gisofinv
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regionales = App\Giregion::orderby('renombre', 'asc')->pluck('renombre', 'id')->all();
        $centros = App\Gicenfor::orderby('cfnombre', 'asc')->pluck('cfnombre', 'id')->all();
        $grupos = App\Gigruinv::orderby('ginombre', 'asc')->pluck('ginombre', 'id')->all();
        $proyectos = App\Giproinv::orderby('pinompro', 'asc')->pluck('pinompro', 'id')->all();
        $software = App\Gisofinv::join('giproinv', 'gisofinv.siprovin', 'giproinv.id')
                                    ->join('gigruinv', 'giproinv.pigruinv', 'gigruinv.id')
                                    ->join('gicenfor', 'gigruinv.gicenfor', 'gicenfor.id')
                                    ->join('giregion', 'gicenfor.cfregion', 'giregion.id')
                                    ->select('gisofinv.*', 'giproinv.id as proyecto', 'gigruinv.id as grupo',
                                    'gicenfor.id as centro', 'giregion.id as regional')
                                    ->where('gisofinv.id', $id)
                                    ->first();

        return view('gisofinv.edit', compact('regionales', 'centros','grupos', 'proyectos', 'software'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gisofinv  $gisofinv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mensajes de error
        $mensajes = [
            'sinumrad.required' => 'Debe ingresar el número de radicación.',
            'sinumrad.unique' => 'Ya hay un software con el número de radicado que intenta asignar.',
            'sititobr.required' => 'Debe ingresar el título de la obra.',
            'siprovin.required' => 'Debe seleccionar el proyecto vinculado.',
            'sifecrad.required' => 'Debe seleccionar la fecha de radicación.',
            'siesttra.required' => 'Debe seleccionar el estado del trámite.',
            'sinumreg.required' => 'Debe ingresar el número de registro.'
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'siprovin' => 'required',
            'sititobr' => 'required',
            'sinumrad' => 'required',
            'sifecrad' => 'required',
            'siesttra' => 'required',
            'sinumreg' => 'required',
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('gisofinv/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $software = App\Gisofinv::findorfail($id);
        $software->update($request->all());

        return redirect()->route( 'gisofinv.index' )
                         ->with( 'exito', 'Software modificado con éxito' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gisofinv  $gisofinv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gisofinv $gisofinv)
    {
        $software = App\Gisofinv::findorfail($id);
        $software->delete();
        return redirect()->route( 'gisofinv.index' )
                         ->with( 'exito', 'Software eliminado con éxito' );
    }
}
