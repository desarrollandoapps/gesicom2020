<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GicapsemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $capacitaciones = App\Gicapsem::orderby( 'csnombre', 'asc' )->get();
        return view('gicapsem.index', compact('capacitaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gicapsem.insert');
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
            'csnombre.required' => 'Debe ingresar el nombre de la capacitación.',
            'csnombre.unique' => 'Ya hay una capacitación con el nombre que intenta asignar.'
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'csnombre'=>'required|unique:gicapsem'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('gicapsem/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Se toma el modelo
        App\Gicapsem::create( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'gicapsem.index' )
                         ->with( 'exito', 'Capacitación creada con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gicapsem  $gicapsem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $capacitacion = App\Gicapsem::findorfail($id);
        return view( 'gicapsem.view', compact('capacitacion') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gicapsem  $gicapsem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $capacitacion = App\Gicapsem::findorfail($id);
        return view( 'gicapsem.edit', compact('capacitacion') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gicapsem  $gicapsem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate( [
            'csnombre'=>'required|unique:gicapsem'
            ] );

        $capacitacion = App\Gicapsem::findorfail( $id );

        $capacitacion->update( $request->all() );

        return redirect()->route( 'gicapsem.index' )
                         ->with( 'exito', 'Capacitación modificada con éxito' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gicapsem  $gicapsem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $capacitacion = App\Gicapsem::findorfail($id);
        $capacitacion->delete();
        return redirect()->route( 'gicapsem.index' )
                         ->with( 'exito', 'Capacitación eliminada con éxito' );
    }
}
