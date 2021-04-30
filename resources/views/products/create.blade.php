@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Agregar un nuevo producto</h2>
        </div>
    </div>
 </div>

        <div class="pull-right">
            <a class="btn btn-primary" href="{{route('products.index')}}"> Volver</a>
        </div>

<form action="{{ route('products.store') }}" method="POST">

    @csrf
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Estado:</strong>

                <input type="text" name="estado" class="form-control" placeholder="estado">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Precio Unitario:</strong>

                <input class="form-control" name="preciounitario" placeholder="Precio Unitario">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Id Categoria:</strong>

                <input type="text" name="idcategoria" class="form-control" placeholder="Id categoria">

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Id lote:</strong>

                <input type="text" name="idlote" class="form-control" placeholder="Id lote">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection