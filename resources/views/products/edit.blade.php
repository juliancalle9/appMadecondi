@extends('adminlte::page')
@section('title', 'Editar Producto')
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

        <a class="btn btn-primary" href="{{ route('products.index') }}"> Volver</a>

    </div>

</div>

</div>




<div class="card">
    <div class="card-body">

        <form action="{{ route('products.update',$product->idproducto) }}" method="POST">

        @csrf

        @method('PUT')

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Nombre:</strong>

                    <input type="text" name="nombre" value="{{$product->nombre}}" class="form-control" placeholder="{{$product->nombre}}">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
  
                    <strong>Precio de Venta:</strong>

                    <input class="form-control" type="number"  name="precioventa" value="{{$product->precioventa}}" placeholder="Precio Venta">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
  
                    <strong>Precio de Compra:</strong>

                    <input class="form-control" type="number" name="preciocompra" value="{{$product->preciocompra}}" placeholder="Precio Compra">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Stock:</strong>

                    <input class="form-control"  type="numeric" name="stock" value="{{$product->stock}}" placeholder="Stock">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                <label for="category">Categoria:</label>

                <label for="client">Cliente</label><br>
                        <input list="categorias" name="idcategoria" id="idcategoria" class="form-control">
                        <datalist name="idcategoria" id="categorias" class="">
                            @foreach($categories as $category)
                            <option value="{{$category->idcategoria}}" id="idcategoria"> {{$category->nombre}}</option>
                            @endforeach
                        </datalist>
                        <input type="hidden" id="idcategoria">


               
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

