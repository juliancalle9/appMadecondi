@extends('adminlte::page');
@section('title', 'Agregar Ciudad')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>
<link href="css/sweetalert.css" rel="stylesheet">

<div class="card">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Agregar una nueva ciudad</h2>
        </div>
        <br>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{route('cities.index')}}"> Volver</a>
        </div>
    </div>
</div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('cities.store') }}"  class="d-inline formulario-agregar" method="POST">
                @csrf
                <div class="row">

                    <div class="">

                        <div class="">

                            <div class="form-group">
                                <label>Nombre:</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                            </div>

                        </div>

                    </div>  

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                        <button type="submit" class="btn btn-success">Guardar</button>

                    </div>
                </div>
            </form>
        </div>
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

@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
    document.querySelector('.btn-success').addEventListener('click', Guardar)
    function Guardar(){
        Swal.fire(
        'Buen trabajo!',
        'Ciudad agregada con exito',
        'success'
        )
    }
    </script>
@endsection