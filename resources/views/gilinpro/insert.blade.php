@extends('layouts.app', ['activePage' => 'gilinpro', 'titlePage' => __('Crear Línea Programática')])

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
                            <h4 class="card-title">Creación de {{__('gilinpro')}} </h4>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $item)
                                            <li> {{$item}} </li>
                                        @endforeach
                                    </ul>    
                                </div>
                                <br>
                            @endif
                            <form action="{{route('gilinpro.store')}} " method="POST">
                                @csrf
                                @method('POST')
                        
                                <div class="form-group">
                                    <label>Nombre de la línea</label>
                                    <input type="text" class="form-control" name="lpnomlin" value="{{old('csnombre')}}">
                                </div>
                        
                                <br>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
    <script>

    </script>
@endsection