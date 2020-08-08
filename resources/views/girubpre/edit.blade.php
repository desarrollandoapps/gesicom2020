@extends('layouts.app', ['activePage' => 'girubpre', 'titlePage' => __('Modificar Rubro Presupuestal')])

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
                        <h4 class="card-title">Modificar {{__('girubpre')}}</h4>
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
                        <form action="{{route('girubpre.update', $rubro->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Descripción del Rubro Presupuestal</label>
                                <input type="text" class="form-control" name="rpdesrub" value="{{$rubro->rpdesrub}}">
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
