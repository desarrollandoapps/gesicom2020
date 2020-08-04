<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class GidearauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $autores = App\Giinvest::join('gidearau', 'giinvest.id', 'gidearau.dainvest')
                                        ->join('giartinv', 'gidearau.daartinv', 'giartinv.id' )
                                        ->where('giartinv.id', $request->daartinv)
                                        ->whereNull('gidearau.deleted_at')
                                        ->select('giinvest.*', 'gidearau.id as idDetalle')
                                        ->get();
        $articulo = App\Giartinv::findorfail($request->daartinv);
        $regionales = DB::table('giregion')->pluck('renombre', 'id')->all();
        $centros = DB::table('gicenfor')->pluck('cfnombre', 'id')->all();
        $grupos = App\Gigruinv::orderby('ginombre', 'asc')->pluck('ginombre', 'id')->all();
        $investigadores = App\Giinvest::orderby('innombre', 'asc')->pluck('innombre', 'id')->all();

        return view('gidearau.insert', compact('articulo', 'regionales', 'grupos', 'centros', 'investigadores', 'autores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        App\Gidearau::create( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'gidearau.index' )
                         ->with( 'exito', 'Autor asociado con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gidearau  $gidearau
     * @return \Illuminate\Http\Response
     */
    public function show(Gidearau $gidearau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gidearau  $gidearau
     * @return \Illuminate\Http\Response
     */
    public function edit(Gidearau $gidearau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gidearau  $gidearau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gidearau $gidearau)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gidearau  $gidearau
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $detalle = App\Gidearau::findorfail( $id );
        $detalle->delete();
    }

    public function borrar($id)
    {
        $detalle = App\Gidearau::findorfail( $id );
        $detalle->delete();
    }

    public function asociarInvestigador(Request $request)
    {
        App\Gidearau::create( $request->all() );

        return response()->json(['success' => 'Autor agregado con éxito']);
    }
}
