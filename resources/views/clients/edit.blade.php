<link href="{{ asset('css/formularioi.css') }}" rel="stylesheet">
@extends('adminlte::page')
@section('title', 'Editar cliente')
@section('content')

<div class="card">

<div class="col-lg-12 margin-tb card-header">

    <div class="pull-left">

        <h2>Editar información cliente</h2>

    </div>

    <div class="pull-right">

        <a class="btn btn-primary" href="{{ route('clients.index') }}"> Volver</a>

    </div>

</div>

</div>



@if ($errors->any())

<div class="alert alert-danger">

    <strong>Advertencia!</strong> Hubo algunos problemas con tu entrada.<br><br>

    <ul>

       <!--    @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach -->

    </ul>

</div>

@endif


<div class="card">
    <div class="card-body">
        <form action="{{ route('clients.update',$client->documento) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Documento:</strong>

                        <input type="text" name="documento" value="{{ $client->documento }}" class="form-control" placeholder="Name" readonly>

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Nombre:</strong>

                        <input type="text" name="nombre" value="{{ $client->nombre }}" class="form-control" placeholder="Nombre">

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Apellidos:</strong>

                        <input class="form-control"  name="apellidos" value="{{$client->apellidos}}" placeholder="Apellidos">

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Teléfono:</strong>

                        <input class="form-control"  type="tel" name="telefono" value="{{$client->telefono}}" placeholder="Teléfono">

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                    <strong>Correo Electrónico:</strong>

                    <input class="form-control" type="email"  name="correoElectronico" value="{{$client->correoElectronico}}" placeholder="Correo Electrónico">

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                    <strong>Direccion:</strong>

                    <input class="form-control" type="direccion"  name="direccion" value="{{$client->direccion}}" placeholder="Dirección">

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Guardar</button>

                </div>

            </div>
        </form>
    </div>
</div>
@endsection