@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')

<div class="table-responsive">
    <a href="{{route('repartidores.create')}}" lass="btn btn-default">Crear nuevo</a>
    @if (session('succses'))
    <div class="alert alert-default alert-dismissible fade show" role="alert">
        {{session('succses')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <table class="table align-items-center table-dark">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Apellido Materno</th>
                <th scope="col">Edad</th>
                <th scope="col">Vehiculo</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($repartidores as $repartidor)
            <tr>
                <td>{{$repartidor->nombre}}</td>
                <td>{{$repartidor->apellido_pa}}</td>
                <td>{{$repartidor->apellido_ma}}</td>
                <td>{{$repartidor->edad}}</td>
                <td>{{$repartidor->vehiculo}}</td>
                <td class="text-right">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a href="{{route('repartidores.show',  ['repartidor' => $repartidor->repartidor_id])}}" class="dropdown-item">Detalle <i class="fas fa-info"></i></a>
                            <a href="{{route('repartidores.edit',  ['repartidor' => $repartidor->repartidor_id])}}" class="dropdown-item">Editar <i class="fas fa-edit"></i></a>
                            <form action="{{route('repartidores.destroy', ['repartidor' => $repartidor->repartidor_id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item"> Eliminar<i class="ni ni-fat-delete"></i></button>
                            </form>

                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection