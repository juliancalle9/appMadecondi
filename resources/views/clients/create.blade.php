@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Agregar un nuevo cliente</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{route('clients.index')}}"> Volver</a>

        </div>

    </div>

</div>

<form action="{{ route('clients.store') }}" method="POST">

    @csrf
     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Documento:</strong>

                <input type="text" name="documento" class="form-control" placeholder="Documento">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Nombre:</strong>

                <input type="text" name="nombre" class="form-control" placeholder="Nombre">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Apellidos:</strong>

                <input class="form-control" name="apellidos" placeholder="Apellidos">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Teléfono:</strong>

                <input type="text" name="telefono" class="form-control" placeholder="Teléfono">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Correo Electrónico:</strong>

                <input type="text" name="correoElectronico" class="form-control" placeholder="Correo Electrónico">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Guardar</button>

        </div>

    </div>

   

</form>
@endsection