@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Agregar un nuevo proveedor</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{route('suppliers.index')}}"> Volver</a>

        </div>

    </div>

</div>

<form action="{{ route('suppliers.store') }}" method="POST">

    @csrf
     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-1

<div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Nit:</strong>

                <input type="text" name="nit" class="form-control" placeholder="nit">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Nombre:</strong>

                <input type="text" name="nombre" class="form-control" placeholder="nombre">

       
</div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

<div class="form-group">

    <strong>Direccion:</strong>

    <input type="text" name="direccion" class="form-control" placeholder="direccion">


</div>

</div>

<div class="col-xs-12 col-sm-12 col-md-12">

<div class="form-group">

    <strong>Telefono:</strong>

    <input type="text" name="telefono" class="form-control" placeholder="telefono">


</div>

</div>
<div class="col-xs-12 col-sm-12 col-md-12">

<div class="form-group">

    <strong>Ciudad:</strong>

    <input type="text" name="idciudad" class="form-control" placeholder="idciudad">


</div>

</div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Guardar</button>

        </div>

    </div>

   

</form>