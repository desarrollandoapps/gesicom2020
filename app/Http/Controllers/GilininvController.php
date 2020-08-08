<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GilininvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->buscar;
        $lineas = App\Gilininv::join('gigruinv', 'gilininv.licodgru', 'gigruinv.id')
                                ->select('gilininv.*', 'gigruinv.ginombre as grupo')
                                ->where('lideslin', 'LIKE', '%' . $query . '%')
                                ->orderby( 'lideslin', 'asc' )
                                ->get();
        return view('gilininv.index', compact( 'lineas' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regionales = DB::table('giregion')->pluck('renombre', 'id')->all();
        $centros = DB::table('gicenfor')->pluck('cfnombre', 'id')->all();
        $grupos = DB::table('gigruinv')->pluck('ginombre', 'id')->all();
        return view('gilininv.insert', compact('regionales', 'centros', 'grupos'));
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
            'lideslin.required' => 'Debe ingresar el nombre de la línea.',
            'lideslin.unique' => 'Ya hay una línea con el nombre que intenta asignar.',
            'licodgru.required' => 'Debe seleccionar un grupo de investigación.'
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'lideslin'=>'required|unique:gigruinv', 
            'lideslin'=>'required', 
            'licodgru'=>'required'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('gilininv/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Se toma el modelo
        App\Gilininv::create( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'gilininv.index' )
                         ->with( 'exito', 'Línea de investigación creada con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gilininv  $gilininv
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $linea = App\Gilininv::join('gigruinv', 'gilininv.licodgru', 'gigruinv.id')
                                ->select('gilininv.*', 'gigruinv.ginombre as grupo')
                                ->where('gilininv.id', $id)
                                ->first();
        return view('gilininv.view', compact('linea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gilininv  $gilininv
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $linea = App\Gilininv::findorfail($id);
        $grupos = App\Gigruinv::orderBy('ginombre','asc')->pluck('ginombre', 'id')->all();
        return view( 'gilininv.edit', compact('linea', 'grupos') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gilininv  $gilininv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mensajes de error
        $mensajes = [
            'lideslin.required' => 'Debe ingresar el nombre de la línea.',
            'lideslin.unique' => 'Ya hay una línea con el nombre que intenta asignar.',
            'licodgru.required' => 'Debe seleccionar un grupo de investigación.'
        ];

        $request->validate( [
            'lideslin'=>'required|unique:gigruinv', 
            'lideslin'=>'required', 
            'licodgru'=>'required'
        ], $mensajes);

        $linea = App\Gilininv::findorfail( $id );

        $linea->update( $request->all() );

        return redirect()->route( 'gilininv.index' )
                         ->with( 'exito', 'Línea de investigación modificada con éxito' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gilininv  $gilininv
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $linea = App\Gilininv::findorfail( $id );
        $linea->delete();
        return redirect()->route( 'gilininv.index' )
                         ->with( 'exito', 'Línea de investigación eliminada con éxito' );
    }

    public function darLineas(Request $request, $grupo)
    {
        $lineas = App\Gilininv::where('licodgru', $grupo)->get();
        return response()->json($lineas);
    }
}
