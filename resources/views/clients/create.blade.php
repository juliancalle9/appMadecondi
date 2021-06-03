@extends('adminlte::page')
@include('flash-message')
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
@foreach (['danger', 'warning', 'success', 'info'] as $key)
 @if(Session::has($key))
     <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
 @endif
@endforeach


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

                            <input type="text" name="documento" class="form-control" value="{{ old('documento') }}" placeholder="Documento">

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Nombre:</strong>

                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" placeholder="Nombre">

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Apellidos:</strong>

                            <input class="form-control" name="apellidos" value="{{ old('apellidos') }}" placeholder="Apellidos">

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Teléfono:</strong>

                            <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}" placeholder="Teléfono">

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Correo Electrónico:</strong>

                            <input type="email" name="correoElectronico" class="form-control" value="{{ old('correoElectronico') }}" placeholder="Correo Electrónico">

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Dirección:</strong>

                            <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}" placeholder="Dirección">

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
                <li>{{ $error}}</li>
                
            @endforeach
        </ul>
        <script>

    document.querySelector('.btn-success').addEventListener('click', Guardar)
    function Guardar(){
            
           
            
                 Swal.fire(
            'Error!',
            'error',
            'danger'
            )
            
        
        
    }
    </script>
    </div>
@else
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
@endif
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!--<script>

    document.querySelector('.btn-success').addEventListener('click', Guardar)
    function Guardar(){
            
           
            
                 Swal.fire(
            'Buen trabajo!',
            'Cliente agregado con exito',
            'success'
            )
            
        
        
    }
    </script>-->
@endsection