@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{$repartidor->nombre}} {{$repartidor->apellido_pa}} {{$repartidor->apellido_ma}}</h5> 
    <p class="card-text">Edad: {{$repartidor->edad}}</p>
    <p class="card-text">Vehiculo: {{$repartidor->vehiculo}}</p>
    <p class="card-text">Pago: {{$repartidor->pago}}</p>
    <a href="{{route('repartidores.edit',  ['repartidor' => $repartidor->repartidor_id])}}" class="btn btn-info">Editar <i class="fas fa-edit"></i></a>
  </div>
</div>
</div>

@endsection