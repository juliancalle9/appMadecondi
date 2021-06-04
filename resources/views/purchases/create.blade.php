@extends('adminlte::page')
@section('title', 'Crear Compra')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>
<link href="css/sweetalert.css" rel="stylesheet">

<div class="card">
    <div class="col-lg-12 margin-tb card-header">
        <div class="pull-left">
            <h2>Agregar una nueva compra</h2>
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
            <a class="btn btn-primary" href="{{route('purchases.index')}}"> Volver</a>
        </div>
    </div>
 </div>

<div class="card">
    <div class="card-body">

        <form action="{{ route('purchases.store') }}" method="POST">

            @csrf
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nit:</strong>
                        <input type="text" name="nit" class="form-control" placeholder="Nit">
                    </div>
                </div>
                <div class="form-group">
                <div class="col-xs-12 col-sm-12 col-md-12">
    <label>Proveedor:</label>
    <select name="nit" id="nit" class="form-control" placeholder="nit">
    <option value="">Seleccione el proveedor</option>
           @foreach ($suppliers as $supplier)
           <option value="{{ $supplier['nit'] }}">{{ $supplier['nombre'] }}</option>

           @endforeach
           </select>
</div>

                </div>
    
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fecha compra:</strong>
                        <input type="date" name="fechacompra" class="form-control" placeholder="Fecha Compra">
                    </div>
                </div>
                <div class="row">

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Precio Final:</strong>
        <input type="number" name="precioFinal" class="form-control" placeholder="Precio final">
    </div>
</div>

                



               

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                        <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</form>
</div>
            </div>

@endsection

