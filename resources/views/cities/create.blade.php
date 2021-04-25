@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Agregar una nueva ciudad</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{route('cities.index')}}"> Volver</a>
            <a class="btn btn-primary" href="{{route('home')}}"> menu</a>

        </div>

    </div>

</div>

<form action="{{ route('cities.store') }}" method="POST">

    @csrf
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-1">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Nombre:</strong>

                    <input type="text" name="nombre" class="form-control" placeholder="nombre">

                </div>

            </div>

        </div>  

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" class="btn btn-primary">Guardar</button>

        </div>

    </div>
</form>
@endsection