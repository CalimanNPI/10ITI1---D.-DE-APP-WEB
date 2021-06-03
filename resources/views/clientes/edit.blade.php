@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('clientes.update', ['cliente' => $cliente->cliente_id])}}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nombre"> Nombre</label>
                    <input type="text" class="form-control form-control-alternative" id="nombre" name="nombre" value="{{$cliente->nombre}}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nombre"> Edad</label>
                    <input type="text" class="form-control form-control-alternative" id="edad" name="edad" value="{{$cliente->edad}}" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nombre"> Foto</label>
                    <input type="text" class="form-control form-control-alternative" id="telefono" name="telefono" value="{{$cliente->telefono}}" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nombre"> Descuento</label>
                    <input type="text" class="form-control form-control-alternative" id="descuento" name="descuento" value="{{$cliente->descuento}}" required>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-primary mb-2" value="ACTUALIZAR">
    </form>

</div>
@endsection