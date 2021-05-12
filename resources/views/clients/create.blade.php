@extends('adminlte::page')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>
<link href="css/sweetalert.css" rel="stylesheet">

<div class="card">

    <div class="col-lg-12 margin-tb card-header">

        <div class="pull-left">

            <h2>Agregar un nuevo cliente</h2>
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

            <a class="btn btn-primary" href="{{route('clients.index')}}"> Volver</a>

        </div>

    </div>

</div>
<div class="card">
    <div class="card-body">
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

                            <input type="email" name="correoElectronico" class="form-control" placeholder="Correo Electrónico">

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Dirección:</strong>

                            <input type="text" name="direccion" class="form-control" placeholder="Dirección">

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                            <button type="submit" class="btn btn-success">Guardar</button>

                    </div>

                </div>
            </form>
        </div>
    </div>


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

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
    document.querySelector('.btn-success').addEventListener('click', Guardar)
    function Guardar(){
        Swal.fire(
        'Buen trabajo!',
        'Cliente agregado con exito',
        'success'
        )
    }
    </script>
@endsection