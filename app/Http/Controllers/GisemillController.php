<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App;
use Illuminate\Http\Request;

class GisemillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semilleros = App\Gisemill::orderby('senombre', 'asc')->get();
        return view('gisemill.index', compact('semilleros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gisemill.insert');
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
            'seidsemi.required' => 'Debe ingresar el código del semillero.',
            'seidsemi.unique' => 'Ya hay un semillero con el código que intenta asignar.',
            'senombre.required' => 'Debe ingresar el nombre del semillero.',
            'senombre.unique' => 'Ya hay un semillero con el nombre que intenta asignar.'
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'seidsemi'=>'required|unique:gisemill',
            'senombre'=>'required|unique:gisemill'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('gisemill/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Se toma el modelo
        App\Gisemill::create( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'gisemill.index' )
                         ->with( 'exito', 'Semillero creado con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gisemill  $gisemill
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $semillero = App\Gisemill::findorfail($id);
        return view('gisemill.view', compact('semillero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gisemill  $gisemill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $semillero = App\Gisemill::findorfail($id);
        return view('gisemill.edit', compact('semillero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gisemill  $gisemill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mensajes de error
        $mensajes = [
            'seidsemi.required' => 'Debe ingresar el código del semillero.',
            'seidsemi.unique' => 'Ya hay un semillero con el código que intenta asignar.',
            'senombre.required' => 'Debe ingresar el nombre del semillero.',
            'senombre.unique' => 'Ya hay un semillero con el nombre que intenta asignar.'
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'seidsemi'=>'required|unique:gisemill',
            'senombre'=>'required|unique:gisemill'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('gisemill/update')
                        ->withErrors($validator)
                        ->withInput();
        }

        $semillero = App\Gisemill::findorfail($id);
        $semillero->update($request->all());
        return redirect()->route( 'gisemill.index' )
                         ->with( 'exito', 'Semillero modificado con éxito' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gisemill  $gisemill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $semillero = App\Gisemill::findorfail($id);
        $semillero->delete();
        return redirect()->route( 'gisemill.index' )
                         ->with( 'exito', 'Semillero eliminado con éxito' );

    }
}
