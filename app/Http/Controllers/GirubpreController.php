<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GirubpreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( $request )
        {
            $query = $request->buscar;
            $rubros = App\Girubpre::where('rpdesrub', 'LIKE', '%' . $query . '%')
                                            ->orderby('rpdesrub', 'asc')
                                            ->get();
            return view('girubpre.index', compact('rubros', 'query'));
        }
        $rubros = App\Girubpre::orderby('rpdesrub', 'asc')->get();
        return view('girubpre.index', compact('rubros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('girubpre.insert');
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
            'rpdesrub.required' => 'Debe ingresar la descripción del rubro presupuestal.',
            'rpdesrub.unique' => 'Ya hay un rubro presupuestal con la descripción que intenta asignar.'
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'rpdesrub'=>'required|unique:girubpre'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('girubpre/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Se toma el modelo
        App\Girubpre::create( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'girubpre.index' )
                         ->with( 'exito', 'Rubro presupuestal creado con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Girubpre  $girubpre
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rubro = App\Girubpre::findorfail($id);
        return view( 'girubpre.view', compact('rubro') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Girubpre  $girubpre
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rubro = App\Girubpre::findorfail($id);
        return view('girubpre.edit', compact('rubro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Girubpre  $girubpre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mensajes de error
        $mensajes = [
            'rpdesrub.required' => 'Debe ingresar el nombre del rubro presupuestal.',
            'rpdesrub.unique' => 'Ya hay un rubro presupuestal con el nombre que intenta asignar.'
        ];

        $validator = Validator::make($request->all(), [
            'rpdesrub'=>'required|unique:girubpre'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('girubpre' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Se toma el modelo
        $rubro = App\Girubpre::findorfail( $id );

        $rubro->update( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'girubpre.index' )
                         ->with( 'exito', 'Rubro presupuestal modificado con éxito' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Girubpre  $girubpre
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rubro = App\Girubpre::findorfail( $id );
        $rubro->delete();
        return redirect()->route( 'girubpre.index' )
                         ->with( 'exito', 'Rubro Presupuestal eliminado con éxito' );
    }
}
