<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class GidepresController extends Controller
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
        $proyecto = App\Giproinv::findorfail($request->dpproinv);
        $productos = App\Giproesp::join('giproinv', 'giproesp.peproinv', 'giproinv.id')
                                    ->where('giproesp.peproinv', $request->dpproinv)
                                    ->whereNull('giproesp.deleted_at')
                                    ->select('giproinv.*', 'giproesp.*')
                                    ->orderby('giproesp.pedespro')
                                    ->pluck('pedespro', 'id')
                                    ->all();
        return view('gidepres.insert', compact('proyecto', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        App\Gidepres::create($request->all());

        // return view('gidepres.insert', compact('proyecto', 'productos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gidepres  $gidepres
     * @return \Illuminate\Http\Response
     */
    public function show(Gidepres $gidepres)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gidepres  $gidepres
     * @return \Illuminate\Http\Response
     */
    public function edit(Gidepres $gidepres)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gidepres  $gidepres
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gidepres $gidepres)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gidepres  $gidepres
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gidepres $gidepres)
    {
        //
    }

    public function crearDetalle(Request $request)
    {
        App\Gidepres::create($request->all());

        $producto = App\Giproesp::findOrFail($request->dpproesp);
        $producto->update([
            'peporava' => $request->dpporava
        ]);
        return response()->json(['success' => 'Avance registrado con éxito']);
    }
}
