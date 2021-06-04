@extends('adminlte::page')
@section('title', 'Agregar proveedor')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>
<link href="css/sweetalert.css" rel="stylesheet">

<div class="card">
    <div class="col-lg-12 margin-tb card-header">

        <div class="pull-left">
            <h2>Agregar un nuevo proveedor</h2>
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
            <a class="btn btn-primary" href="{{route('suppliers.index')}}"> Volver</a>
        </div>
    </div>
</div>
    <div class="card">
        <div class="card-body">

            <form action="{{ route('suppliers.store') }}" method="POST">

                @csrf
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="form-group">

                            <label>NIT:</label>

                            <input type="text" name="nit" class="form-control" placeholder="NIT">

                            </div>

                        
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <label>Nombre:</label>

                            <input type="text" name="nombre" class="form-control" placeholder="Nombre">

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <label>Dirección:</label>

                            <input type="text" name="direccion" class="form-control" placeholder="Dirección">


                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                        <label>Teléfono:</label>

                        <input type="text" name="telefono" class="form-control" placeholder="Teléfono">

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                        <label>Correo Electrónico:</label>

                        <input type="email" name="correoelectronico" class="form-control" placeholder="Correo Electrónico">

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                        <label for="city">Ciudad:</label><br>
                        <input list="idciudades" name="idciudad" id="idciudad" class="form-control">
                        <datalist name="idciudad" id="idciudades" class="">
                            <option>--Seleccionar--</option>
                            @foreach($cities as $city)
                            <option value="{{$city->idciudad}}" id="idciudad"> {{$city->nombre}}</option>
                            @endforeach
                        </datalist>
                        <input type="hidden" id="idciudad">
                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                        <button type="submit" class="btn btn-success">Guardar</button>

                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection

