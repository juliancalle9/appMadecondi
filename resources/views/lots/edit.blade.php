@extends('adminlte::page')
@section('title', 'Editar Lote')

@section('content')

<div class="card">

<div class="col-lg-12 margin-tb card-header">

    <div class="pull-left">

        <h2>Editar lote</h2>
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

        <a class="btn btn-primary" href="{{ route('lots.index') }}"> Volver</a>

    </div>

</div>

</div>



<div class="card">
    <div class="card-body">

        <form action="{{ route('lots.update',$lot->idlote) }}" method="POST">

        @csrf

        @method('PUT')

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>fecha Fabricacion:</strong>

                    <input type="date" name="fechaFabricacion" value="{{ $lot->fechaFabricacion }}" class="form-control" placeholder="Fecha fabricacion">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Fecha Vencimiento</strong>

                    <input class="form-control" type="date"  name="fechaVencimiento" value="{{$lot->fechaVencimiento}}" placeholder="Fecha Vencimiento">

                </div>

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Cantidad</strong>

                    <input class="form-control" type="number" name="cantidad" value="{{$lot->cantidad}}" placeholder="Fecha Vencimiento">

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