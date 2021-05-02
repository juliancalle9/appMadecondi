<link href="{{ asset('css/formularioi.css') }}" rel="stylesheet">
@extends('adminlte::page')
@section('title', 'Editar Proveedor')
@section('content')

<div class="card">
        <div class="col-lg-12 margin-tb card-header">
            <div class="pull-left">
                <h2>Editar informacion del proveedor : {{$supplier->nombre}}</h2>
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
                <a class="btn btn-primary" href="{{route('suppliers.index')}}">Volver</a>
            </div>
        </div>
    </div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('suppliers.update',$supplier->nit) }}" method="POST">
 
            @csrf
            @method('PUT')
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nit:</strong>
                        <input type="text" name="nit" value="{{ $supplier->nit }}" class="form-control" placeholder="nit">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="nombre" value="{{ $supplier->nombre }}" class="form-control">
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Direccion:</strong>
                        <input type="text" name="direccion" value="{{ $supplier->direccion }}" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Telefono:</strong>
                        <input type="text" name="telefono" value="{{ $supplier->telefono}}" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Correo Electronico:</strong>
                        <input type="text" name="correoElectronico" value="{{ $supplier->correoElectronico}}" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Ciudad:</strong>
                        <input type="text" name="idciudad" value="{{ $supplier->idciudad}}" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection