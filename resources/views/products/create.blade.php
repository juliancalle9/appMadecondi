@extends('adminlte::page')
@section('title', 'Crear Producto')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>
<link href="css/sweetalert.css" rel="stylesheet">

<div class="card">
    <div class="col-lg-12 margin-tb card-header">
        <div class="pull-left">
            <h2>Agregar un nuevo producto</h2>
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
            <a class="btn btn-primary" href="{{route('products.index')}}"> Volver</a>
        </div>
    </div>
 </div>

<div class="card">
    <div class="card-body">

        <form action="{{ route('products.store') }}" method="POST">

            @csrf
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Precio Unitario:</strong>
                        <input class="form-control" name="preciounitario" placeholder="Precio Unitario">
                    </div>
                </div>

               
                <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

    <label for="category">Categoria:</label>

    <input list="categorias"  name="idcategoria" id="idcategoria" class="form-control" placeholder="idcategoria">
    <datalist name="idcategoria" id="categorias" class="">
    <option value="">--Seleccionar--</option>
           @foreach ($categories as $category)
           <option value="{{ $category['idcategoria'] }}">{{ $category['nombre'] }}</option>

           @endforeach
                        </datalist>
                        <input type="hidden" id="idcategoria">
</div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Stock:</strong>

                        <input type="number" name="stock" class="form-control" placeholder="stock">

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