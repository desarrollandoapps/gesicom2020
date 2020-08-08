@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'titlePage' => __('App name')])

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center minh-100">
            <div class="col-lg-12">
                <div>
                    <img src="images/fondo-portada2.png" alt="Logo" class="img-fluid rounded mx-auto d-block elevation-2 rounded" alt="logo" width="70%" height="70%">
                </div>
                <div class="d-flex justify-content-center">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm mx-auto mt-4">{{ __('Iniciar Sesión') }}</a>
                    @endguest
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
@endsection
