<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->buscar;
        $users = User::where('name', 'LIKE', '%' . $query . '%')
                                ->orderby( 'name', 'asc' )
                                ->get();

        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('administrar-usuario')) 
        {
            return redirect(route('users.index'));
        }

        return view('users.insert');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect('users/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Se toma el modelo
        
        $usuario = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $rol = Role::select('id')->where('nombre', 'Investigador')->first();

        $usuario->roles()->attach($rol);

        // Redireccionar a la página principal con mensaje de éxito
        return redirect()->route( 'users.index' )
                         ->with( 'exito', 'Usuario creado con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Gate::denies('administrar-usuario')) 
        {
            return redirect(route('/'));
        }

        $roles = Role::all();

        return view('users.edit')->with([
            'usuario' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //mensajes de error
        $mensajes = [
            'email.required' => 'Debe ingresar el correo electrónico.',
            'name.required' => 'Debe ingresar el nombre.'
        ];

        // Validar que los campos obligatorios tengan valor
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'email' => 'email:rfc,dns',
            'name' => 'required'
        ], $mensajes);

        if ($validator->fails()) {
            return redirect('users/' . $user->id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        $user->roles()->sync($request->roles);

        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($user->save()) {
            $request->session()->flash('exito',  '¡Se han modificado los datos del usuario '. $user->name . ' exitosamente!');
        } else {
            $request->session()->flash('error', '¡Error al modificar los datos del usuario '. $user->name .'!');
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Gate::denies('administrar-usuario')) 
        {
            return redirect(route('users.index'));
        }

        // Eliminar los roles del usuario
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('users.index')->with('exito', '¡Se ha eliminado al usuario ' . $user->name . ' exitosamente!');
    }
}
