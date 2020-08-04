<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GidepoauController extends Controller
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
        $ponencia = App\Giponinv::findorfail($request->dpponinv);
        $regionales = DB::table('giregion')->pluck('renombre', 'id')->all();
        $centros = DB::table('gicenfor')->pluck('cfnombre', 'id')->all();
        $grupos = App\Gigruinv::orderby('ginombre', 'asc')->pluck('ginombre', 'id')->all();
        if($request->dptippon == '1')
        {
            $autores = App\Giinvest::join('gidepoau', 'giinvest.id', 'gidepoau.dpinvest')
                                        ->join('giponinv', 'gidepoau.dpponinv', 'giponinv.id' )
                                        ->where('giponinv.id', $request->dpponinv)
                                        ->whereNull('gidepoau.deleted_at')
                                        ->select('giinvest.*', 'gidepoau.id as idDetalle', 'giinvest.innombre as nombre')
                                        ->get();
            $investigadores = App\Giinvest::orderby('innombre', 'asc')->pluck('innombre', 'id')->all();
            $esAprendiz = false;
        }
        else {
            $autores = App\Giseminv::join('gidepoau', 'giseminv.id', 'gidepoau.dpinvest')
                                        ->join('giponinv', 'gidepoau.dpponinv', 'giponinv.id' )
                                        ->where('giponinv.id', $request->dpponinv)
                                        ->whereNull('gidepoau.deleted_at')
                                        ->select('giseminv.*', 'gidepoau.id as idDetalle', 'giseminv.sinombre as nombre')
                                        ->get();
            $investigadores = App\Giseminv::orderby('sinombre', 'asc')->pluck('sinombre', 'id')->all();
            $esAprendiz = true;
        }
        return view('gidepoau.insert', compact('ponencia', 'regionales', 'grupos', 'centros', 'investigadores', 'autores', 'esAprendiz'));
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
     * @param  \App\Gidepoau  $gidepoau
     * @return \Illuminate\Http\Response
     */
    public function show(Gidepoau $gidepoau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gidepoau  $gidepoau
     * @return \Illuminate\Http\Response
     */
    public function edit(Gidepoau $gidepoau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gidepoau  $gidepoau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gidepoau $gidepoau)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gidepoau  $gidepoau
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gidepoau $gidepoau)
    {
        //
    }

    public function borrar($id)
    {
        $detalle = App\Gidepoau::findorfail( $id );
        $detalle->delete();
    }

    public function asociarInvestigador(Request $request)
    {
        App\Gidepoau::create( $request->all() );

        return response()->json(['success' => 'Autor agregado con éxito']);
    }
}
