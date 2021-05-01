@extends('adminlte::page');
@section('title', 'Agregar Ciudad')
@section('content')
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
            <form action="{{ route('cities.store') }}" method="POST">
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

                        <button type="submit" class="btn btn-primary">Guardar</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection