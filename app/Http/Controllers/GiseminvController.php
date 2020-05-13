<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        return view('giseminv.insert', compact('capacitaciones'));
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
            'sicorper.email' => 'Debe ingresar una dirección de correo personal válida',
            'sicorsen.required' => 'Debe ingresar el correo electrónico SENA.',
            'sicorsen.email' => 'Debe ingresar una dirección de correo sena válida'
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'sinombre'=>'required', 
            'sinumdoc'=>'required|unique:giseminv', 
            'sicorper.required',
            'sicorper' => 'email:rfc,dns',
            'sicorsen.required',
            'sicorsen' => 'email:rfc,dns',
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('giseminv/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Se toma el modelo
        App\Gigruinv::create( $request->all() );

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
    public function show(Giseminv $giseminv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Giseminv  $giseminv
     * @return \Illuminate\Http\Response
     */
    public function edit(Giseminv $giseminv)
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
    public function update(Request $request, Giseminv $giseminv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Giseminv  $giseminv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Giseminv $giseminv)
    {
        //
    }
}
