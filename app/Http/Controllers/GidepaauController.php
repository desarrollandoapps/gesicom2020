<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GidepaauController extends Controller
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
        $patente = App\Gipatinv::findorfail($request->dppatinv);
        $regionales = DB::table('giregion')->pluck('renombre', 'id')->all();
        $centros = DB::table('gicenfor')->pluck('cfnombre', 'id')->all();
        $grupos = App\Gigruinv::orderby('ginombre', 'asc')->pluck('ginombre', 'id')->all();
        $autores = App\Giinvest::join('gidepaau', 'giinvest.id', 'gidepaau.dpinvest')
                                    ->join('gipatinv', 'gidepaau.dppatinv', 'gipatinv.id' )
                                    ->where('gipatinv.id', $request->dppatinv)
                                    ->whereNull('gidepaau.deleted_at')
                                    ->select('giinvest.*', 'gidepaau.id as idDetalle')
                                    ->get();
        $investigadores = App\Giinvest::orderby('innombre', 'asc')->pluck('innombre', 'id')->all();
        
        return view('gidepaau.insert', compact('patente', 'regionales', 'grupos', 'centros', 'investigadores', 'autores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gidepaau  $gidepaau
     * @return \Illuminate\Http\Response
     */
    public function show(Gidepaau $gidepaau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gidepaau  $gidepaau
     * @return \Illuminate\Http\Response
     */
    public function edit(Gidepaau $gidepaau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gidepaau  $gidepaau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gidepaau $gidepaau)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gidepaau  $gidepaau
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gidepaau $gidepaau)
    {
        //
    }

    public function borrar($id)
    {
        $detalle = App\Gidepaau::findorfail( $id );
        $detalle->delete();
    }

    public function asociarInvestigador(Request $request)
    {
        App\Gidepaau::create( $request->all() );

        return response()->json(['success' => 'Autor agregado con éxito']);
    }
}
