@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">

            <div class="pull-left">
                <h2>Ventas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('sales.create')}}">Agregar venta</a>
            </div>
    </div>
</div>
    
    <table class="table table-bordered">
        <tr>
            <th>Id Venta</th>
            <th>Nombre Cliente</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Precio Unitario</th>
            <th>Precio Total</th>
            <th>Acciones</th>
        </tr>
        @foreach ($sales as $sale)
        <tr>
            <td>{{ $sale->idVenta }}</td>
            <td>{{ $sale->nombreCliente }}</td>
            <td>{{ $sale->telefono }}</td>
            <td>{{ $sale->direccion }}</td>
            <td>{{ $sale->precioUnitario }}</td>
            <td>{{ $sale->precioTotal }}</td>

            <td><a href="{{route('sales.edit',$sale->idVenta)}}" class="btn btn-info">Editar</a>
        </tr>
        @endforeach
    </table>

@endsection