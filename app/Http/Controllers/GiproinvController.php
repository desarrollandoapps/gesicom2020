<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class GiproinvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( $request )
        {
            $query = $request->buscar;
            $proyectos = App\Giproinv::where('pinompro', 'LIKE', '%' . $query . '%')
                                        ->orderby('pianofor', 'desc')
                                        ->orderby('pinompro', 'asc')
                                        ->get();
            return view('giproinv.index', compact('proyectos', 'query'));
        }

        $proyectos = App\Giproinv::orderby('pianofor', 'desc')
                                ->orderby('pinompro', 'asc')
                                ->get();
        return view('giproinv.index', compact('proyectos'));
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
        $grupos = App\Gigruinv::orderby('ginombre', 'asc')->pluck('ginombre', 'id')->all();
        $lineas = App\Gilinpro::orderby('lpnomlin', 'asc')->pluck('lpnomlin', 'id')->all();
        return view('giproinv.insert', compact('lineas', 'regionales', 'centros', 'grupos'));
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
            'pinompro.required' => 'Debe ingresar el nombre del proyecto.',
            'pinompro.unique' => 'Ya hay un proyecto con el nombre que intenta asignar.',
            'piregion.required' => 'Debe ingresar la regional.',
            'picenfor.required' => 'Debe ingresar el centro de formación.',
            'pigruinv.required' => 'Debe ingresar el Grupo de investigación.',
            'pianofor.required' => 'Debe ingresar el año de formulación.',
            'pinumrad.required' => 'Debe ingresar el número de radicado.',
            'pivalpre.required' => 'Debe ingresar el valor presupuestado.',
            'pianoeje.required' => 'Debe ingresar el año de ejecución.',
            'pilinpro.required' => 'Debe seleccionar una línea programática.'
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'piregion' => 'required',
            'picenfor' => 'required',
            'pigruinv' => 'required',
            'pianofor' => 'required',
            'pinompro' => 'required|unique:giproinv',
            'pinumrad' => 'required',
            'pivalpre' => 'required',
            'pianoeje' => 'required',
            'pilinpro' => 'required|nullable'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('giproinv/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        

        $valor = str_replace(['$', '.'], ['',''], $request->pivalpre);
        $request->merge(['pivalpre' => $valor]);

        // Se toma el modelo
        App\Giproinv::create( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'giproinv.index' )
                         ->with( 'exito', 'Proyecto creado con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Giproinv  $giproinv
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyecto = App\Giproinv::join('giregion', 'giproinv.piregion', 'giregion.id')
                                ->join('gicenfor', 'giproinv.picenfor', 'gicenfor.id')
                                ->join('gigruinv', 'giproinv.pigruinv', 'gigruinv.id')
                                ->join('gilinpro', 'giproinv.pilinpro', 'gilinpro.id')
                                ->select('giproinv.*', 'giregion.renombre as regional', 
                                'gicenfor.cfnombre as centro', 'gilinpro.lpnomlin as linea',
                                'gigruinv.ginombre as grupo')
                                ->where('giproinv.id', $id)
                                ->first();
        
        $productosEsperados = App\Giproesp::join('giproinv', 'giproesp.peproinv', 'giproinv.id')
                                            ->select('giproesp.*')
                                            ->where('giproinv.id', $id)
                                            ->get();

        $investigadores = App\Giinvest::join('gidetinv', 'giinvest.id', 'gidetinv.diinvest')
                                        ->join('giproinv', 'gidetinv.diproinv', 'giproinv.id' )
                                        ->where('giproinv.id', $id)
                                        ->where('gidetinv.deleted_at', NULL)
                                        ->select('giinvest.*')
                                        ->get();
        
        $articulos = App\Giartinv::join('giproinv', 'giartinv.aiprovin', 'giproinv.id')
                                    ->select('giartinv.*')
                                    ->where('giartinv.aiprovin', $id)
                                    ->get();

        $libros = App\Gilibinv::join('giproinv', 'gilibinv.liprovin', 'giproinv.id')
                                    ->select('gilibinv.*')
                                    ->where('gilibinv.liprovin', $id)
                                    ->get();

        $patentes = App\Gipatinv::join('giproinv', 'gipatinv.piprovin', 'giproinv.id')
                                    ->select('gipatinv.*')
                                    ->where('gipatinv.piprovin', $id)
                                    ->get();

        $ponencias = App\Giponinv::join('giproinv', 'giponinv.piprovin', 'giproinv.id')
                                    ->select('giponinv.*')
                                    ->where('giponinv.piprovin', $id)
                                    ->get();

        $software = App\Gisofinv::join('giproinv', 'gisofinv.siprovin', 'giproinv.id')
                                    ->select('gisofinv.*')
                                    ->where('gisofinv.siprovin', $id)
                                    ->get();

        return view( 'giproinv.view', compact('proyecto', 'investigadores', 'articulos', 'libros', 'patentes', 
                                                'ponencias', 'software', 'productosEsperados') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Giproinv  $giproinv
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyecto = App\Giproinv::findorfail($id);
        $lineas = App\Gilinpro::orderby('lpnomlin', 'asc')->get();
        $regionales = DB::table('giregion')->pluck('renombre', 'id')->all();
        $centros = DB::table('gicenfor')->pluck('cfnombre', 'id')->all();
        $grupos = App\Gigruinv::orderby('ginombre', 'asc')->pluck('ginombre', 'id')->all();
        return view('giproinv.edit', compact('proyecto', 'lineas', 'regionales', 'centros', 'grupos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Giproinv  $giproinv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mensajes de error
        $mensajes = [
            'pinompro.required' => 'Debe ingresar el nombre del proyecto.',
            'pinompro.unique' => 'Ya hay un proyecto con el nombre que intenta asignar.',
            'piregion.required' => 'Debe ingresar la regional.',
            'picenfor.required' => 'Debe ingresar el centro de formación.',
            'pigruinv.required' => 'Debe ingresar el Grupo de investigación.',
            'pianofor.required' => 'Debe ingresar el año de formulación.',
            'pinumrad.required' => 'Debe ingresar el número de radicado.',
            'pivalpre.required' => 'Debe ingresar el valor presupuestado.',
            'pianoeje.required' => 'Debe ingresar el año de ejecución.',
            'pilinpro.required' => 'Debe seleccionar una línea programática.'
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'piregion' => 'required',
            'picenfor' => 'required',
            'pigruinv' => 'required',
            'pianofor' => 'required',
            'pinompro' => 'required',
            'pinumrad' => 'required',
            'pivalpre' => 'required',
            'pianoeje' => 'required',
            'pilinpro' => 'required|nullable'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('giproinv/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Se toma el modelo
        $proyecto = App\Giproinv::findorfail( $id );

        $valor = str_replace(['$', '.'], ['',''], $request->pivalpre);
        $request->merge(['pivalpre' => $valor]);

        $proyecto->update( $request->all() );

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'giproinv.index' )
                         ->with( 'exito', 'Proyecto modificado con éxito' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Giproinv  $giproinv
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyecto = App\Giproinv::findorfail( $id );
        $proyecto->delete();
        return redirect()->route( 'giproinv.index' )
                         ->with( 'exito', 'Proyecto eliminado con éxito' );
    }

    public function darProyectos($grupo)
    {
        $proyectos = App\Giproinv::where('pigruinv', $grupo)->get();
        return response()->json($proyectos);
    }

    public function addInvestigador(Request $request, $id)
    {
         //mensajes de error
         $mensajes = [
            'piinvest.required' => 'Debe seleccionar un investigador.'
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'piinvest' => 'required'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('giproinv/' . $id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $investigadores = App\Giinvest::all();

        $investigador = $investigadores[$request->giinvest - 1];
        $investigador->update();

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'giproinv/' . $id )
                         ->with( 'exito', 'Investigador asociado con éxito' );
        
        // echo $investigadores[$request->giinvest - 1]->innombre;
    }

    public function darProyecto($id)
    {
        $proyecto = App\Giproinv::findorfail($id);
        return response()->json($proyecto);
    }

    public function darInvestigadoresProyecto($id)
    {
        $investigadores = App\Giinvest::join('gidetinv', 'giinvest.id', 'gidetinv.diinvest')
                                        ->join('giproinv', 'gidetinv.diproinv', 'giproinv.id' )
                                        ->where('giproinv.id', $id)
                                        ->where('gidetinv.deleted_at', NULL)
                                        ->select('giinvest.*')
                                        ->get();
        return response()->json($investigadores);
    }
}
