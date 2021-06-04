@extends('adminlte::page')
@section('title', 'Editar Compra')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>
<link href="css/sweetalert.css" rel="stylesheet">

<div class="card">

<div class="col-lg-12 margin-tb card-body">

    <div class="pull-left">

        <h2>Editar Producto</h2>
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

        <a class="btn btn-primary" href="{{ route('purchases.index') }}"> Volver</a>

    </div>

</div>

</div>




<div class="card">
    <div class="card-body">

        <form action="{{ route('purchases.update',$purchase->idcompra) }}" method="POST">

        @csrf

        @method('PUT')

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Fecha compra:</strong>

                    <input type="text" name="fechacompra" value="{{ $purchase->fechacompra }}" class="form-control" placeholder="Fechacompra">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
  
                    <strong>Proveedor:</strong>

                    <input class="form-control"  name="nit" value="{{$purchase->nit}}" placeholder="Proveedor">

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

