<link href="{{ asset('css/formularioi.css') }}" rel="stylesheet">
@extends('adminlte::page');
@section('title', 'Editar Proveedor')
@section('content')

<div class="card">

    <div class="col-lg-12 margin-tb card-header">

        <div class="pull-left">

            <h2>Editar información del proveedor</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('suppliers.index') }}"> Volver</a>

        </div>

    </div>
</div>

 
<div class="card">
    <div class="card-body">
        <form action="{{ route('suppliers.update',$supplier->nit) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nit:</strong>
                        <input type="text" name="nit"  class="form_control" placeholder="nit" readonly value="{{$supplier->nit}}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="nombre"  class="form_control" placeholder="nombre" value="{{$supplier->nombre}}">
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Direccion:</strong>
                        <input type="text" class="form_control" name="direccion"  placeholder="direccion" value="{{$supplier->direccion}}">      
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Telefono:</strong>
                        <input type="text" name="telefono"  class="form_control" placeholder="telefono" value="{{$supplier->telefono}}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>ciudad:</strong>
                        <input type="text" name="idciudad"  class="form_control" placeholder="idciudad" value="{{$supplier->idciudad}}">
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