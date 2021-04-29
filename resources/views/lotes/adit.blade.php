@extends('adminlte::page')

@section('content')

<div class="row">

<div class="col-lg-12 margin-tb">

    <div class="pull-left">

        <h2>Editar lote</h2>

    </div>

    <div class="pull-right">

        <a class="btn btn-primary" href="{{ route('lots.index') }}"> Volver</a>

    </div>

</div>

</div>



@if ($errors->any())

<div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif



<form action="{{ route('lots.update',$lot->idlote) }}" method="POST">

@csrf

@method('PUT')



 <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>fecha Fabricacion:</strong>

            <input type="text" name="fechaFabricacion" value="{{ $lot->fechaFabricacion }}" class="form-control" placeholder="Fecha fabricacion">

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Fecha Vencimiento</strong>

            <input class="form-control"  name="fechaVencimiento" value="{{$lot->fechaVencimiento}}" placeholder="Fecha Vencimiento">

        </div>

    </div>

</div>
<div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Cantidad</strong>

            <input class="form-control"  name="cantidad" value="{{$lot->cantidad}}" placeholder="Fecha Vencimiento">

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

      <button type="submit" class="btn btn-primary">Submit</button>

    </div>

</div>



</form>

@endsection