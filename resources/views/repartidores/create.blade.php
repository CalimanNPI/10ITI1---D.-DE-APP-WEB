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
    <form action="{{ route('repartidores.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nombre"> Nombre</label>
                    <input type="text" class="form-control form-control-alternative" id="nombre" name="nombre" value="{{old('nombre')}}" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nombre"> Apellido Paterno</label>
                    <input type="text" class="form-control form-control-alternative" id="apellido_pa" name="apellido_pa" value="{{old('apellido_pa')}}" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nombre"> Apellido Materno</label>
                    <input type="text" class="form-control form-control-alternative" id="apellido_ma" name="apellido_ma" value="{{old('apellido_ma')}}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nombre"> Edad</label>
                    <input type="text" class="form-control form-control-alternative" id="edad" name="edad" value="{{old('edad')}}" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nombre"> Foto</label>
                    <input type="file" class="form-control form-control-alternative" id="foto_repartidor" name="foto_repartidor" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nombre"> Veiculo</label>
                    <input type="text" class="form-control form-control-alternative" id="vehiculo" name="vehiculo" value="{{old('vehiculo')}}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nombre"> Email</label>
                    <input type="email" class="form-control form-control-alternative" id="email" name="email" value="{{old('email')}}" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nombre"> Password</label>
                    <input type="password" class="form-control form-control-alternative" id="password" name="password" required>
                </div>
            </div>

        </div>
        <input type="submit" class="btn btn-primary mb-2" value="REGISTRAR">
    </form>

</div>
@endsection