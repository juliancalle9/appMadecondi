@extends('adminlte::page')
@section('title', 'Agregar Venta')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>
<link href="css/sweetalert.css" rel="stylesheet">

    <div class="card">
        <div class="col-lg-12 margin-tb card-header">
            <div class="pull-left">
                <h2>Agregar una nueva venta</h2>
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
                 <a class="btn btn-primary" href="{{route('sales.index')}}">Volver</a>
            </div>
        </div>
        
    </div>
<div class="card">
    <div class="card-body">
            <form action="{{ route('sales.store') }}" method="POST">
                @csrf

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="client">Cliente</label>
                        <select name="documento" id="documento" class="form-control selectpicker">
                            @foreach($clients as $client)
                            <option value="{{$client->documento}}">{{$client->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Telefono:</strong>
                        <input type="text" class="form-control" name="telefono" placeholder="Telefono">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Direccion:</strong>
                        <input type="text" name="direccion" class="form-control" placeholder="Direccion">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Precio Unitario:</strong>
                        <input type="text" name="precioUnitario" class="form-control" placeholder="Precio Unitario">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Precio Total:</strong>
                        <input type="text" name="precioTotal" class="form-control" placeholder="Precio Total">
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
        'Venta agregada con exito',
        'success'
        )
    }
    </script>
@endsection