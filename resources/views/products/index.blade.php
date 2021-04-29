@extends('layouts.app')

@section('content')
@section('title', 'Productos')

<div class="row">
    <div class="col-lg-12 margin-tb">

            <div class="pull-left">
                <h2>Productos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('products.create')}}">Agregar Productos</a>
                <a href="{{route('categories.index')}}" class="btn btn-secondary">Categorías</a>
                
            </div>
    </div>
</div>

<table class="table table-bordered">
    

    <tr>

        <th>Id Producto</th>

        <th>Id Categoria</th>

        <th>Id Lote</th>

        <th>Nombre</th>

        <th>EStado</th>

        <th>Precio Unitario</th>

        <th>Acciones</th>

    </tr>

    @foreach ($products as $product)
    <tr>
        <td>{{ $product->idproducto }}</td>
        
        <td>{{ $product->idcategoria }}</td>

        <td>{{ $product->idlote }}</td>

        <td>{{ $product->estado }}</td>

        <td>{{ $product->preciounitario }}</td>

        <td><a href="{{route('products.edit',$product->idproducto)}}" class="btn btn-info">Editar</a>
    </tr>

    @endforeach

</table>

@endsection