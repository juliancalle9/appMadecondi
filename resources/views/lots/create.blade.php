@extends('adminlte::page')
@section('title', 'Crear Lote')

@section('content')
<div class="card">

    <div class="col-lg-12 margin-tb card-header">

        <div class="pull-left">

            <h2>Agregar nuevo lote</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{route('lots.index')}}"> Volver</a>

        </div>

    </div>

</div>

<div class="card">
    <div class="card-body">

        <form action="{{ route('lots.store') }}" method="POST">

            @csrf
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Fecha Fabricación:</strong>

                        <input type="date" name="fechaFabricacion" class="form-control" placeholder="Fecha fabricacion">

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Fecha Vencimiento:</strong>

                        <input type="date" name="fechaVencimiento" class="form-control" placeholder="Fecha Vencimiento">

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Cantidad:</strong>

                        <input type="number" class="form-control" name="cantidad" placeholder="Cantidad">

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