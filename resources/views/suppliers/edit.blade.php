<link href="{{ asset('css/formularioi.css') }}" rel="stylesheet">
@extends('adminlte::page')
@section('title', 'Editar Proveedor')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>
<link href="css/sweetalert.css" rel="stylesheet">

<div class="card">
        <div class="col-lg-12 margin-tb card-header">
            <div class="pull-left">
                <h2>Editar informacion del proveedor</h2>
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
                <a class="btn btn-primary" href="{{route('suppliers.index')}}">Volver</a>
            </div>
        </div>
    </div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('suppliers.update',$supplier->id) }}" method="POST">
 
            @csrf
            @method('PUT')
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>NIT:</strong>
                        <input type="text" name="nit" value="{{ $supplier->nit }}" class="form-control" placeholder="NIT" readonly>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="nombre" value="{{ $supplier->nombre }}" class="form-control">
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Dirección:</strong>
                        <input type="text" name="direccion" value="{{ $supplier->direccion }}" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Teléfono:</strong>
                        <input type="text" name="telefono" value="{{ $supplier->telefono}}" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Correo Electrónico:</strong>
                        <input type="text" name="correoelectronico" value="{{ $supplier->correoelectronico}}" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <label for="city">Ciudad:</label><br>
                        <input list="idciudades" name="idciudad" id="idciudad" class="form-control">
                        <datalist name="idciudad" id="idciudades" class="">
                            @foreach($cities as $city)
                            <option value="{{$city->idciudad}}" id="idciudad"> {{$city->nombre}}</option>
                            @endforeach
                        </datalist>
                        <input type="hidden" id="idciudad">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

