@extends('layouts.app')

@section('content')

<div class="row">

<div class="col-lg-12 margin-tb">

    <div class="pull-left">

        <h2>Editar Producto</h2>

    </div>

    <div class="pull-right">

        <a class="btn btn-primary" href="{{ route('products.index') }}"> Volver</a>

    </div>

</div>

</div>



@if ($errors->any())

<div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif



<form action="{{ route('products.update',$product->idproducto) }}" method="POST">

@csrf

@method('PUT')



 <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Nombre:</strong>

            <input type="text" name="nombre" value="{{ $product->nombre }}" class="form-control" placeholder="Nombre">

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Precio Unitario:</strong>

            <input class="form-control"  name="preciounitario" value="{{$product->preciounitario}}" placeholder="Precio Unitario">

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Id Categoria:</strong>

            <input class="form-control"  type="tel" name="idcategoria" value="{{$product->idcategoria}}" placeholder="Id Categoria">

        </div>

    </div>


</div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

      <button type="submit" class="btn btn-primary">Submit</button>

    </div>

</div>



</form>

@endsection