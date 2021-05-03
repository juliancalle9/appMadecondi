@extends('adminlte::page')
@section('title', 'Agregar categoria')
@section('content')

<<<<<<< HEAD
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>
<link href="css/sweetalert.css" rel="stylesheet">

=======
>>>>>>> 9fe1e8f6527aea0b33a8300a20a7b698fa0c8436
<div class="card">

    <div class="col-lg-12 margin-tb card-header">

        <div class="pull-left">

            <h2>Agregar un nueva categoria</h2>
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

    <strong>categoria:</strong>

    <input type="text" name="idcategoria"  class="form-control" placeholder="idcategoria">

</div>

</div>
<div class="col-xs-12 col-sm-12 col-md-12">

    <div class="form-group">

        <strong>Nombre:</strong>

        <input type="text" name="nombre"  class="form-control" placeholder="Nombre">

    </div>

</div>

<div class="col-xs-12 col-sm-12 col-md-12">

    <div class="form-group">

        <strong>Descripción</strong>

        <input class="form-control"  name="descripcion" placeholder="descripción">

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

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
    document.querySelector('.btn-success').addEventListener('click', Guardar)
    function Guardar(){
        Swal.fire(
        'Buen trabajo!',
        'Categoria agregada con exito',
        'success'
        )
    }
    </script>
@endsection