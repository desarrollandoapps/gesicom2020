<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GiartinvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = App\Giartinv::orderBy('aititulo', 'asc')->get();
        return view('giartinv.index', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regionales = App\Giregion::orderby('renombre', 'asc')->pluck('renombre', 'id')->all();
        $centros = App\Gicenfor::orderby('cfnombre', 'asc')->pluck('cfnombre', 'id')->all();
        $grupos = App\Gigruinv::orderby('ginombre', 'asc')->pluck('ginombre', 'id')->all();
        $proyectos = App\Giproinv::orderby('pinompro', 'asc')->pluck('pinompro', 'id')->all();
        $tiposArticulo = App\Gitipart::orderby('tanomtip', 'asc')->pluck('tanomtip', 'id')->all();

        return view('giartinv.insert', compact('regionales', 'centros','grupos', 'proyectos', 'tiposArticulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //mensajes de error
        $mensajes = [
            'aititulo.required' => 'Debe ingresar el nombre del artículo.',
            'aititulo.unique' => 'Ya hay un artículo con el nombre que intenta asignar.',
            'aipagini.required' => 'Debe ingresar el número de la página inicial donde se ubica el artículo en la revista.',
            'aipagfin.required' => 'Debe ingresar el número de la página final donde se ubica el artículo en la revista.',
            'aianopub.required' => 'Debe seleccionar el año de publicación del artículo.',
            'aimespub.required' => 'Debe seleccionar el mes de publicación del artículo.',
            'ainomrev.required' => 'Debe ingresar el nombre de la revista donde se publica el artículo.',
            'aivolrev.required' => 'Debe ingresar el volumen de la revista donde se publica el artículo.',
            'aiserrev.required' => 'Debe ingresar la serie de la revista donde se publica el artículo.',
            'aiciupub.required' => 'Debe ingresar la ciudad de la revista donde se publica el artículo.',
            'aimeddiv.required' => 'Debe ingresar el medio de divulgación donde se publica el artículo.',
            'aicoissn.required' => 'Debe ingresar el código ISSN de la revista donde se publica el artículo.',
            'aicoddoi.required' => 'Debe ingresar el código DOI del artículo.',
            'aiprovin.required' => 'Debe seleccionar el proyecto.',
            'aicodtip.required' => 'Debe seleccionar el tipo de artículo.',
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'aicodtip' => 'required',
            'aiprovin' => 'required',
            'aititulo' => 'required|unique:giartinv',
            'aipagini' => 'required',
            'aipagfin' => 'required',
            'aianopub' => 'required',
            'aimespub' => 'required',
            'ainomrev' => 'required',
            'aivolrev' => 'required',
            'aiserrev' => 'required',
            'aiciupub' => 'required',
            'aimeddiv' => 'required',
            'aicoissn' => 'required',
            'aicoddoi' => 'required'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('giartinv/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Se toma el modelo
        App\Giartinv::create( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'giartinv.index' )
                         ->with( 'exito', 'Artículo creado con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Giartinv  $giartinv
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo = App\Giartinv::join('giproinv', 'giartinv.aiprovin', 'giproinv.id')
                                    ->join('gitipart', 'giartinv.aicodtip', 'gitipart.id')
                                    ->select('giartinv.*', 'giproinv.pinompro as proyecto', 'gitipart.tanomtip as tipo')
                                    ->where('giartinv.id', $id)
                                    ->first();
        return view('giartinv.view', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Giartinv  $giartinv
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regionales = App\Giregion::orderby('renombre', 'asc')->pluck('renombre', 'id')->all();
        $centros = App\Gicenfor::orderby('cfnombre', 'asc')->pluck('cfnombre', 'id')->all();
        $grupos = App\Gigruinv::orderby('ginombre', 'asc')->pluck('ginombre', 'id')->all();
        $proyectos = App\Giproinv::orderby('pinompro', 'asc')->pluck('pinompro', 'id')->all();
        $tiposArticulo = App\Gitipart::orderby('tanomtip', 'asc')->pluck('tanomtip', 'id')->all();

        $articulo = App\Giartinv::join('giproinv', 'giartinv.aiprovin', 'giproinv.id')
                                    ->join('gitipart', 'giartinv.aicodtip', 'gitipart.id')
                                    ->select('giartinv.*', 'giproinv.pinompro as proyecto', 'gitipart.tanomtip as tipo')
                                    ->where('giartinv.id', $id)
                                    ->first();

        return view('giartinv.edit', compact('articulo', 'regionales', 'centros', 'grupos',
                                    'proyectos', 'tiposArticulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Giartinv  $giartinv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mensajes de error
        $mensajes = [
            'aititulo.required' => 'Debe ingresar el nombre del artículo.',
            'aipagini.required' => 'Debe ingresar el número de la página inicial donde se ubica el artículo en la revista.',
            'aipagfin.required' => 'Debe ingresar el número de la página final donde se ubica el artículo en la revista.',
            'aianopub.required' => 'Debe seleccionar el año de publicación del artículo.',
            'aimespub.required' => 'Debe seleccionar el mes de publicación del artículo.',
            'ainomrev.required' => 'Debe ingresar el nombre de la revista donde se publia el artículo.',
            'aivolrev.required' => 'Debe ingresar el volumen de la revista donde se publia el artículo.',
            'aiserrev.required' => 'Debe ingresar la serie de la revista donde se publia el artículo.',
            'aiciupub.required' => 'Debe ingresar la ciudad de la revista donde se publia el artículo.',
            'aimeddiv.required' => 'Debe ingresar el medio de divulgación donde se publia el artículo.',
            'aicoissn.required' => 'Debe ingresar el código ISSN de la revista donde se publia el artículo.',
            'aicoddoi.required' => 'Debe ingresar el código DOI del artículo.',
            'aiprovin.required' => 'Debe seleccionar el proyecto.',
            'aicodtip.required' => 'Debe seleccionar el tipo de artículo.',
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'aicodtip' => 'required',
            'aiprovin' => 'required',
            'aititulo' => 'required',
            'aipagini' => 'required',
            'aipagfin' => 'required',
            'aianopub' => 'required',
            'aimespub' => 'required',
            'ainomrev' => 'required',
            'aivolrev' => 'required',
            'aiserrev' => 'required',
            'aiciupub' => 'required',
            'aimeddiv' => 'required',
            'aicoissn' => 'required',
            'aicoddoi' => 'required'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('giartinv/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $articulo = App\Giartinv::findorfail($id);
        $articulo->update($request->all());

        return redirect()->route( 'giartinv.index' )
                         ->with( 'exito', 'Artículo modificado con éxito' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Giartinv  $giartinv
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = App\Giartinv::findorfail($id);
        $articulo->delete();

        return redirect()->route( 'giartinv.index' )
                         ->with( 'exito', 'Artículo eliminado con éxito' );
    }
}
