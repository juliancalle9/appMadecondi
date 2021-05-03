@extends('adminlte::page')
@section('title', 'Editar Venta')
@section('content')
    <div class="card">
        <div class="col-lg-12 margin-tb card-header">
            <div class="pull-left">
                <h2>Modificar venta: {{$sale->nombreCliente}}</h2>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('sales.index')}}">Volver</a>
            </div>
        </div>
    </div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('sales.update',$sale->idVenta) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombre Cliente:</strong>
                        <input type="text" name="nombreCliente" value="{{ $sale->nombreCliente }}" class="form-control" placeholder="Nombre Cliente">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Telefono:</strong>
                        <input type="text" class="form-control" name="telefono" value="{{ $sale->telefono }}" placeholder="Telefono">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Direccion:</strong>
                        <input type="text" name="direccion" value="{{ $sale->direccion }}" class="form-control" placeholder="Direccion">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Precio Unitario:</strong>
                        <input type="text" name="precioUnitario" value="{{ $sale->precioUnitario }}" class="form-control" placeholder="Precio Unitario">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Precio Total:</strong>
                        <input type="text" name="precioTotal" value="{{ $sale->precioTotal }}" class="form-control" placeholder="Precio Total">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection