<?php

namespace App\Http\Controllers;

use App;
use App\Giregion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GigruinvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Listar todos los registros estableciendo ordenamiento, campo y tipo
        $grupos = App\Gigruinv::orderby( 'ginombre', 'asc' )->get();

        // Se redirecciona hacia la vista index pasando la lista de grupos
        return view('gigruinv.index', compact( 'grupos' ) );
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
        return view('gigruinv.insert', compact('regionales', 'centros'));
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
            'gicodgru.required' => 'Debe ingresar el código del grupo ante Colciencias.',
            'gicodgru.unique' => 'Ya hay un grupo de investigación con el código que intenta asignar.',
            'giregpnd.required' => 'Debe ingresar la región.',
            'giregion.required' => 'Debe ingresar la regional.',
            'gicenfor.required' => 'Debe ingresar el centro de formación.',
            'ginombre.required' => 'Debe ingresar el nombre del grupo.',
            'gimescre.required' => 'Debe selecionar el mes de creación.',
            'gianocre.required' => 'Debe ingresar el año de creación.'
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'gicodgru'=>'required|unique:gigruinv', 
            'giregpnd'=>'required', 
            'giregion'=>'required', 
            'gicenfor'=>'required', 
            'ginombre'=>'required', 
            'gimescre'=>'required', 
            'gianocre'=>'required'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('gigruinv/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Se toma el modelo
        App\Gigruinv::create( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'gigruinv.index' )
                         ->with( 'exito', 'Grupo de investigación creado con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gigruinv  $gigruinv
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        //
        $grupo = App\Gigruinv::join('giregion', 'gigruinv.giregion', 'giregion.id')
                                ->join('gicenfor', 'gigruinv.gicenfor', 'gicenfor.id')
                                ->select('gigruinv.*', 'giregion.renombre as regional', 'gicenfor.cfnombre as centro')
                                ->where('gigruinv.id', $id)
                                ->first();

        return view( 'gigruinv.view', compact('grupo') );
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gigruinv  $gigruinv
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        //
        $grupo = App\Gigruinv::findorfail( $id );

        $regionales = DB::table('giregion')->pluck('renombre', 'id')->all();
        $centros = DB::table('gicenfor')->pluck('cfnombre', 'id')->all();

        return view( 'gigruinv.edit', compact('grupo', 'regionales', 'centros') );
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gigruinv  $gigruinv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mensajes de error
        $mensajes = [
            'gicodgru.required' => 'Debe ingresar el código del grupo ante Colciencias.',
            'gicodgru.unique' => 'Ya hay un grupo de investigación con el código que intenta asignar.',
            'giregpnd.required' => 'Debe ingresar la región.',
            'giregion.required' => 'Debe ingresar la regional.',
            'gicenfor.required' => 'Debe ingresar el centro de formación.',
            'ginombre.required' => 'Debe ingresar el nombre del grupo.',
            'gimescre.required' => 'Debe selecionar el mes de creación.',
            'gianocre.required' => 'Debe ingresar el año de creación.'
        ];
        $request->validate( [
            'gicodgru'=>'required',
            'giregpnd'=>'required', 
            'giregion'=>'required', 
            'gicenfor'=>'required', 
            'ginombre'=>'required', 
            'gimescre'=>'required', 
            'gianocre'=>'required' 
        ], $mensajes);

        $grupo = App\Gigruinv::findorfail( $id );

        $grupo->update( $request->all() );

        return redirect()->route( 'gigruinv.index' )
                         ->with( 'exito', 'Grupo de investigación modificado con éxito' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gigruinv  $gigruinv
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        //
        $grupo = App\Gigruinv::findorfail( $id );

        $grupo->delete();

        return redirect()->route( 'gigruinv.index' )
                         ->with( 'exito', 'Grupo de investigación eliminado con éxito' );
    }

    public function darGrupos(Request $request, $centro)
    {
        $grupos = App\Gigruinv::where('gicenfor', $centro)->get();
        return response()->json($grupos);
    }
    
}
