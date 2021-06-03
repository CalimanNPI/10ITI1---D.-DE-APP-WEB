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
    <form action="{{ route('repartidores.update', ['repartidor' => $repartidor->repartidor_id])}}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nombre"> Nombre</label>
                    <input type="text" class="form-control form-control-alternative" id="nombre" name="nombre" value="{{$repartidor->nombre}}" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nombre"> Apellido Paterno</label>
                    <input type="text" class="form-control form-control-alternative" id="apellido_pa" name="apellido_pa" value="{{$repartidor->apellido_pa}}" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nombre"> Apellido Materno</label>
                    <input type="text" class="form-control form-control-alternative" id="apellido_ma" name="apellido_ma" value="{{$repartidor->apellido_ma}}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nombre"> Edad</label>
                    <input type="text" class="form-control form-control-alternative" id="edad" name="edad" value="{{$repartidor->edad}}" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nombre"> Foto</label>
                    <input type="file" class="form-control form-control-alternative" id="foto_repartidor" name="foto_repartidor">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                <label for="nombre"> Veiculo</label>
                    <input type="text" class="form-control form-control-alternative" id="vehiculo" name="vehiculo" value="{{$repartidor->vehiculo}}" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                <label for="nombre"> Pago</label>
                    <input type="text" class="form-control form-control-alternative" id="pago" name="pago" value="{{$repartidor->pago}}" required>
                </div>
            </div>
        </div>

        <input type="submit" class="btn btn-primary mb-2" value="EDITAR">
    </form>
</div>

@endsection