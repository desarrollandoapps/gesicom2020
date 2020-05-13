<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class GiproinvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = App\Giproinv::orderby('pinompro')->get();
        return view('giproinv.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Giproinv  $giproinv
     * @return \Illuminate\Http\Response
     */
    public function show(Giproinv $giproinv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Giproinv  $giproinv
     * @return \Illuminate\Http\Response
     */
    public function edit(Giproinv $giproinv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Giproinv  $giproinv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Giproinv $giproinv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Giproinv  $giproinv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Giproinv $giproinv)
    {
        //
    }
}
