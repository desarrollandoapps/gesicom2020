<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GideliauController extends Controller
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
        $autores = App\Giinvest::join('gideliau', 'giinvest.id', 'gideliau.dlinvest')
                                        ->join('gilibinv', 'gideliau.dllibinv', 'gilibinv.id' )
                                        ->where('gilibinv.id', $request->dllibinv)
                                        ->whereNull('gideliau.deleted_at')
                                        ->select('giinvest.*', 'gideliau.id as idDetalle')
                                        ->get();
        $libro = App\Gilibinv::findorfail($request->dllibinv);
        $regionales = DB::table('giregion')->pluck('renombre', 'id')->all();
        $centros = DB::table('gicenfor')->pluck('cfnombre', 'id')->all();
        $grupos = App\Gigruinv::orderby('ginombre', 'asc')->pluck('ginombre', 'id')->all();
        $investigadores = App\Giinvest::orderby('innombre', 'asc')->pluck('innombre', 'id')->all();
        return view('gideliau.insert', compact('libro', 'regionales', 'grupos', 'centros', 'investigadores', 'autores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        App\Gideliau::create( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'gideliau.index' )
                         ->with( 'exito', 'Autor asociado con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gideliau  $gideliau
     * @return \Illuminate\Http\Response
     */
    public function show(Gideliau $gideliau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gideliau  $gideliau
     * @return \Illuminate\Http\Response
     */
    public function edit(Gideliau $gideliau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gideliau  $gideliau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gideliau $gideliau)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gideliau  $gideliau
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $detalle = App\Gideliau::findorfail( $id );
        $detalle->delete();
    }

    public function borrar($id)
    {
        $detalle = App\Gideliau::findorfail( $id );
        $detalle->delete();
    }

    public function asociarInvestigador(Request $request)
    {
        App\Gideliau::create( $request->all() );

        return response()->json(['success' => 'Autor agregado con éxito']);
    }
}
