<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class GidetinvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $investigadoresAsociados = App\Giinvest::join('gidetinv', 'giinvest.id', 'gidetinv.diinvest')
                                        ->join('giproinv', 'gidetinv.diproinv', 'giproinv.id' )
                                        ->where('giproinv.id', $request->diproinv)
                                        ->whereNull('gidetinv.deleted_at')
                                        ->select('giinvest.*', 'gidetinv.id as idDetalle', 'gidetinv.*')
                                        ->get();

        $proyecto = App\Giproinv::findorfail($request->diproinv);
        $regionales = DB::table('giregion')->pluck('renombre', 'id')->all();
        $centros = DB::table('gicenfor')->pluck('cfnombre', 'id')->all();
        $grupos = App\Gigruinv::orderby('ginombre', 'asc')->pluck('ginombre', 'id')->all();
        $investigadores = App\Giinvest::orderby('innombre', 'asc')->pluck('innombre', 'id')->all();

        return view('gidetinv.insert', compact('proyecto', 'regionales', 'grupos', 'centros', 'investigadores', 'investigadoresAsociados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        App\Gidetinv::create( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'giproinv.index' )
                         ->with( 'exito', 'Investigador asociado con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gidetinv  $gidetinv
     * @return \Illuminate\Http\Response
     */
    public function show(Gidetinv $gidetinv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gidetinv  $gidetinv
     * @return \Illuminate\Http\Response
     */
    public function edit(Gidetinv $gidetinv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gidetinv  $gidetinv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gidetinv $gidetinv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gidetinv  $gidetinv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $detalle = App\Gidetinv::findorfail( $id );
        $detalle->delete();
    }

    public function borrar($id)
    {
        $detalle = App\Gidetinv::findorfail( $id );
        $detalle->delete();
    }

    public function asociarInvestigador(Request $request)
    {
        App\Gidetinv::create( $request->all() );

        return response()->json(['success' => 'Investigador agregado con éxito']);
    }
}
