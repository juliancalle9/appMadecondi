@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">

            <div class="pull-left">
                <h2>Categoria</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('categories.create')}}">Agregar categoria</a>
                <a href="{{route('products.index')}}" class="btn btn-secondary">Productos</a>
            </div>
    </div>
</div>

<table class="table table-bordered">
    

    <tr>

        <th>Id Categoria</th>

        <th>Nombre</th>

        <th>descripcion</th>

        <th>Acciones</th>

    </tr>

    @foreach ($categories as $category)
    <tr>
        <td>{{$category->idcategoria}}</td>
    
        <td>{{ $category->nombre }}</td>

        <td>{{ $category->descripcion }}</td>


        <td><a href="{{route('categories.edit',$category->idcategoria)}}" class="btn btn-info">Editar</a>
    </tr>

    @endforeach

</table>

@endsection