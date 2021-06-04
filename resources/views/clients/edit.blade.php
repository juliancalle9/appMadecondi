<link href="{{ asset('css/formularioi.css') }}" rel="stylesheet">
@extends('adminlte::page')
@section('title', 'Editar cliente')
@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>
<link href="css/sweetalert.css" rel="stylesheet">

<div class="card">

<div class="col-lg-12 margin-tb card-header">

    <div class="pull-left">

        <h2>Editar información cliente:{{$client->nombre}}</h2></h2>
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

        <a class="btn btn-primary" href="{{ route('clients.index') }}"> Volver</a>

    </div>

</div>

</div>



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

                    <strong>Dirección:</strong>

                    <input class="form-control" type="text"  name="direccion" value="{{$client->direccion}}" placeholder="Dirección">

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-info">Guardar</button>

                </div>

            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
    document.querySelector('.btn-info').addEventListener('click', Guardar)
    function Guardar(){
        Swal.fire(
        'Buen trabajo!',
        'Cliente modificado con exito',
        'info'
        )
    }
    </script>
@endsection