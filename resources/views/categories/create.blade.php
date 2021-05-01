@extends('adminlte::page')
@section('title', 'Agregar proveedor')
@section('content')
<div class="card">

    <div class="col-lg-12 margin-tb card-header">

        <div class="pull-left">

            <h2>Agregar nueva categoria</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{route('categories.index')}}"> Volver</a>
          

        </div>

    </div>

</div>

<div class="card">
    <div class="card-body">

    @csrf
     <div class="row">
     
     <div class="col-xs-12 col-sm-12 col-md-12">

<div class="form-group">

    <strong>Id Categoria:</strong>

    <input type="text" name="idcategoria" class="form-control" placeholder="idCategoria">

</div>

</div>
        <form action="{{ route('categories.store') }}" method="POST">

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

                        <strong>Descripcion:</strong>

                        <input class="form-control" name="descripcion" placeholder="Descripcion">

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                        <button type="submit" class="btn btn-primary">Guardar</button>

                </div>

</form>
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
</div>
@endsection