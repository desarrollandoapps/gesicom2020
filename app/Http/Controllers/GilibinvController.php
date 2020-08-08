<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GilibinvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = App\Gilibinv::orderBy('linomlib', 'asc')->get();
        return view('gilibinv.index', compact('libros'));
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
        $tiposLibro = App\Gitiplib::orderby('tlnomtip', 'asc')->pluck('tlnomtip', 'id')->all();

        return view('gilibinv.insert', compact('regionales', 'centros','grupos', 'proyectos', 'tiposLibro'));
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
            'linomlib.required' => 'Debe ingresar el nombre del libro.',
            'linomlib.unique' => 'Ya hay un libro con el nombre que intenta asignar.',
            'linumpag.required' => 'Debe ingresar el número de páginas del libro.',
            'lianopub.required' => 'Debe seleccionar el año de publicación del librp.',
            'limespub.required' => 'Debe seleccionar el mes de publicación del libro.',
            'lidiapub.required' => 'Debe seleccionar el díq de publicación del libro.',
            'lieditor.required' => 'Debe ingresar la editorial que publica el libro.',
            'liciupub.required' => 'Debe ingresar la ciudad de publicación del libro.',
            'limeddiv.required' => 'Debe ingresar el medio de divulgación del libro.',
            'licoisbn.required' => 'Debe ingresar el código ISBN del libro.',
            'liprovin.required' => 'Debe seleccionar el proyecto.',
            'licodtip.required' => 'Debe seleccionar el tipo de libro.',
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'licodtip' => 'required',
            'liprovin' => 'required',
            'linomlib' => 'required|unique:gilibinv',
            'linumpag' => 'required',
            'lianopub' => 'required',
            'limespub' => 'required',
            'lidiapub' => 'required',
            'lieditor' => 'required',
            'liciupub' => 'required',
            'limeddiv' => 'required',
            'licoisbn' => 'required'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('gilibinv/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Se toma el modelo
        App\Gilibinv::create( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'gilibinv.index' )
                         ->with( 'exito', 'Libro creado con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gilibinv  $gilibinv
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = App\Gilibinv::join('giproinv', 'gilibinv.liprovin', 'giproinv.id')
                                    ->join('gitiplib', 'gilibinv.licodtip', 'gitiplib.id')
                                    ->select('gilibinv.*', 'giproinv.pinompro as proyecto', 'gitiplib.tlnomtip as tipo')
                                    ->where('gilibinv.id', $id)
                                    ->first();
        
        $autores = App\Giinvest::join('gideliau', 'giinvest.id', 'gideliau.dlinvest')
                                    ->join('gilibinv', 'gideliau.dllibinv', 'gilibinv.id')
                                    ->select('giinvest.*')
                                    ->where('gilibinv.id', $id)
                                    ->get();
                                    
        return view('gilibinv.view', compact('libro', 'autores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gilibinv  $gilibinv
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regionales = App\Giregion::orderby('renombre', 'asc')->pluck('renombre', 'id')->all();
        $centros = App\Gicenfor::orderby('cfnombre', 'asc')->pluck('cfnombre', 'id')->all();
        $grupos = App\Gigruinv::orderby('ginombre', 'asc')->pluck('ginombre', 'id')->all();
        $proyectos = App\Giproinv::orderby('pinompro', 'asc')->pluck('pinompro', 'id')->all();
        $tiposLibro = App\Gitiplib::orderby('tlnomtip', 'asc')->pluck('tlnomtip', 'id')->all();

        $libro = App\Gilibinv::join('giproinv', 'gilibinv.liprovin', 'giproinv.id')
                                    ->join('gitiplib', 'gilibinv.licodtip', 'gitiplib.id')
                                    ->select('gilibinv.*', 'giproinv.pinompro as proyecto', 'gitiplib.tlnomtip as tipo')
                                    ->where('gilibinv.id', $id)
                                    ->first();

        return view('gilibinv.edit', compact('libro', 'regionales', 'centros', 'grupos',
                                    'proyectos', 'tiposLibro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gilibinv  $gilibinv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mensajes de error
        $mensajes = [
            'linomlib.required' => 'Debe ingresar el nombre del libro.',
            'linumpag.required' => 'Debe ingresar el número de páginas del libro.',
            'lianopub.required' => 'Debe seleccionar el año de publicación del librp.',
            'limespub.required' => 'Debe seleccionar el mes de publicación del libro.',
            'lidiapub.required' => 'Debe seleccionar el díq de publicación del libro.',
            'lieditor.required' => 'Debe ingresar la editorial que publica el libro.',
            'liciupub.required' => 'Debe ingresar la ciudad de publicación del libro.',
            'limeddiv.required' => 'Debe ingresar el medio de divulgación del libro.',
            'licoisbn.required' => 'Debe ingresar el código ISBN del libro.',
            'liprovin.required' => 'Debe seleccionar el proyecto.',
            'licodtip.required' => 'Debe seleccionar el tipo de libro.',
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'licodtip' => 'required',
            'liprovin' => 'required',
            'linomlib' => 'required',
            'linumpag' => 'required',
            'lianopub' => 'required',
            'limespub' => 'required',
            'lidiapub' => 'required',
            'lieditor' => 'required',
            'liciupub' => 'required',
            'limeddiv' => 'required',
            'licoisbn' => 'required'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('gilibinv/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $libro = App\Gilibinv::findorfail($id);
        $libro->update($request->all());

        return redirect()->route( 'gilibinv.index' )
                         ->with( 'exito', 'Libro modificado con éxito' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gilibinv  $gilibinv
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = App\Gilibinv::findorfail($id);
        $libro->delete();

        return redirect()->route( 'gilibinv.index' )
                         ->with( 'exito', 'Libro eliminado con éxito' );
    }
}
