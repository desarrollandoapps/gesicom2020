<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class GiproespController extends Controller
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
                                    ->get();
        return view('giproesp.insert', compact('proyecto', 'productos'));
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
     * @param  \App\Giproesp  $giproesp
     * @return \Illuminate\Http\Response
     */
    public function show(Giproesp $giproesp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Giproesp  $giproesp
     * @return \Illuminate\Http\Response
     */
    public function edit(Giproesp $giproesp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Giproesp  $giproesp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Giproesp $giproesp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Giproesp  $giproesp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Giproesp $giproesp)
    {
        //
    }

    public function asociarProducto(Request $request) 
    {
        App\Giproesp::create($request->all());
        return response()->json(['success' => 'Producto agregado con éxito']);
    }

    public function borrar($id)
    {
        $producto = App\Giproesp::findorfail( $id );
        $producto->delete();
    }

    public function darPorcentajeProducto($id)
    {
        $producto = App\Giproesp::findorfail( $id );
        return $producto->peporava;
    }

}
