<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GidesoauController extends Controller
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
        $autores = App\Giinvest::join('gidesoau', 'giinvest.id', 'gidesoau.dsinvest')
                                        ->join('gisofinv', 'gidesoau.dssofinv', 'gisofinv.id' )
                                        ->where('gisofinv.id', $request->dssofinv)
                                        ->whereNull('gidesoau.deleted_at')
                                        ->select('giinvest.*', 'gidesoau.id as idDetalle')
                                        ->get();
        $software = App\Gisofinv::findorfail($request->dssofinv);
        $regionales = DB::table('giregion')->pluck('renombre', 'id')->all();
        $centros = DB::table('gicenfor')->pluck('cfnombre', 'id')->all();
        $grupos = App\Gigruinv::orderby('ginombre', 'asc')->pluck('ginombre', 'id')->all();
        $investigadores = App\Giinvest::orderby('innombre', 'asc')->pluck('innombre', 'id')->all();
        return view('gidesoau.insert', compact('software', 'regionales', 'grupos', 'centros', 'investigadores', 'autores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        App\Gidesoau::create( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'gidesoau.index' )
                         ->with( 'exito', 'Autor asociado con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gidesoau  $gidesoau
     * @return \Illuminate\Http\Response
     */
    public function show(Gidesoau $gidesoau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gidesoau  $gidesoau
     * @return \Illuminate\Http\Response
     */
    public function edit(Gidesoau $gidesoau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gidesoau  $gidesoau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gidesoau $gidesoau)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gidesoau  $gidesoau
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $detalle = App\Gidesoau::findorfail( $id );
        $detalle->delete();
    }

    public function borrar($id)
    {
        $detalle = App\Gidesoau::findorfail( $id );
        $detalle->delete();
    }

    public function asociarInvestigador(Request $request)
    {
        App\Gidesoau::create( $request->all() );

        return response()->json(['success' => 'Autor agregado con éxito']);
    }
}
