@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{$cliente->nombre}}</h5> 
    <p class="card-text">Edad: {{$cliente->edad}}</p>
    <p class="card-text">Teléfono: {{$cliente->telefono}}</p>
    <p class="card-text">Descuento: {{$cliente->descuento}}</p>
    <a href="{{route('clientes.edit',  ['cliente' => $cliente->cliente_id])}}" class="btn btn-info">Editar <i class="fas fa-edit"></i></a>
  </div>
</div>
</div>

@endsection