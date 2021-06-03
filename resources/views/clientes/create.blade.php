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
    <form action="{{ route('clientes.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nombre"> Nombre</label>
                    <input type="text" class="form-control form-control-alternative" id="nombre" name="nombre" value="{{old('nombre')}}" required>
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
                    <label for="nombre"> Teléfono</label>
                    <input type="text" class="form-control form-control-alternative" id="telefono" name="telefono" value="{{old('telefono')}}" required>
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