<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GigruinvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Listar todos los registros estableciendo ordenamiento, campo y tipo
        $grupos = App\Gigruinv::orderby( 'ginombre', 'asc' )->get();

        // Se redirecciona hacia la vista index pasando la lista de grupos
        return view('gigruinv.index', compact( 'grupos' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gigruinv.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'gicodgru'=>'required|unique:gigruinv', 
            'giregpnd'=>'required', 
            'giregion'=>'required', 
            'gicenfor'=>'required', 
            'ginombre'=>'required', 
            'gimescre'=>'required', 
            'gianocre'=>'required'
        ]);

        if ($validator->fails()) {
            return redirect('gigruinv/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Se toma el modelo
        App\Gigruinv::create( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'gigruinv.index' )
                         ->with( 'exito', 'Grupo de investigación creado con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gigruinv  $gigruinv
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        //
        $grupo = App\Gigruinv::findorfail( $id );

        // Enviar a la vista retornando el grupo
        return view( 'gigruinv.view', compact('grupo') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gigruinv  $gigruinv
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        //
        $grupo = App\Gigruinv::findorfail( $id );

         // Enviar a la vista retornando el grupo
         return view( 'gigruinv.edit', compact('grupo') );
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gigruinv  $gigruinv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate( [
            'gicodgru'=>'required', 
            'giregpnd'=>'required', 
            'giregion'=>'required', 
            'gicenfor'=>'required', 
            'ginombre'=>'required', 
            'gimescre'=>'required', 
            'gianocre'=>'required' ] );

        $grupo = App\Gigruinv::findorfail( $id );

        $grupo->update( $request->all() );

        return redirect()->route( 'gigruinv.index' )
                         ->with( 'exito', 'Grupo de investigación modificado con éxito' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gigruinv  $gigruinv
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        //
        $grupo = App\Gigruinv::findorfail( $id );

        $grupo->delete();

        return redirect()->route( 'gigruinv.index' )
                         ->with( 'exito', 'Grupo de investigación eliminado con éxito' );
    }
}
