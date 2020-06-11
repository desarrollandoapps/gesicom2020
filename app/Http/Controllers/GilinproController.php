<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GilinproController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lineas = App\Gilinpro::orderby('lpnomlin', 'asc')->get();
        return view('gilinpro.index', compact('lineas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gilinpro.insert');
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
            'lpnomlin.required' => 'Debe ingresar el nombre de la línea.',
            'lpnomlin.unique' => 'Ya hay una línea con el nombre que intenta asignar.'
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'lpnomlin'=>'required|unique:gilinpro'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('gilinpro/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Se toma el modelo
        App\Gilinpro::create( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'gilinpro.index' )
                         ->with( 'exito', 'Línea programática creada con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gilinpro  $gilinpro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $linea = App\Gilinpro::findorfail($id);
        return view( 'gilinpro.view', compact('linea') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gilinpro  $gilinpro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $linea = App\Gilinpro::findorfail($id);
        return view('gilinpro.edit', compact('linea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gilinpro  $gilinpro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mensajes de error
        $mensajes = [
            'lpnomlin.required' => 'Debe ingresar el nombre de la línea.',
            'lpnomlin.unique' => 'Ya hay una línea con el nombre que intenta asignar.'
        ];

        $validator = Validator::make($request->all(), [
            'lpnomlin'=>'required|unique:gilinpro'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('gilinpro' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Se toma el modelo
        $linea = App\Gilinpro::findorfail( $id );

        $linea->update( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'gilinpro.index' )
                         ->with( 'exito', 'Línea programática modificada con éxito' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gilinpro  $gilinpro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $linea = App\Gilinpro::findorfail( $id );
        $linea->delete();
        return redirect()->route( 'gilinpro.index' )
                         ->with( 'exito', 'Línea programática eliminada con éxito' );
    }
}
