@extends('adminlte::page')
@section('title', 'Agregar categoria')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>
<link href="css/sweetalert.css" rel="stylesheet">

<div class="card">

    <div class="col-lg-12 margin-tb card-header">

        <div class="pull-left">

            <h2>Agregar un nueva categoría</h2>
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
        <br>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{route('categories.index')}}"> Volver</a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
    <form action="{{ route('categories.store') }}" method="POST">

    @csrf
    <div class="row">
    
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Nombre:</strong>

                <input type="text" name="nombre"  class="form-control" placeholder="Nombre">
                @error('title')
                    <p class="error-message">{{ $message }}</p>
                @enderror

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Descripción</strong>

                <input class="form-control"  name="descripcion" placeholder="Descripción">
                @error('title')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

        <button type="submit" class="btn btn-success">Guardar</button>

        </div>

</div>
</form>
</div>
</div>
@endsection

