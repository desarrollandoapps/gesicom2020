@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('Editar usuario')])

@section('hidden-search')
    hidden
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Modificar usuario</h4>
                    </div>
                    <div class="card-body">
                        {{-- @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                        <li> {{$item}} </li>
                                    @endforeach
                                </ul>    
                            </div>
                            <br>
                        @endif --}}
                        <form action="{{route('users.update', $usuario)}} " method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nombre:</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $usuario->name }}" required autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <label for="roles" class="col-md-2 col-form-label text-md-right">Roles:</label>
                                <div class="col-md-6">
                                    @foreach ($roles as $rol)
                                        <div class="form-check">
                                            <input type="checkbox" name="roles[]" value="{{$rol->id}}"
                                            @if ($usuario->roles->pluck('id')->contains($rol->id)) checked @endif >
                                            <label>{{$rol->nombre}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection