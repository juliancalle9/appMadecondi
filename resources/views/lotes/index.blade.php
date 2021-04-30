@extends('adminlte::page')

@section('content')
@section('title', 'Lotes')

<div class="row">
    <div class="col-lg-12 margin-tb">

            <div class="pull-left">
                <h2>Lotes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('lots.create')}}">Agregar Lotes</a>
               
            </div>
    </div>
</div>

<table class="table table-bordered">
    

    <tr>

        <th>Id Lote</th>

        <th>Fecha Fabricacion</th>

        <th>Fecha Vencimiento</th>

        <th>Cantidad</th>

        <th>Acciones</th>

    </tr>

    @foreach ($lots as $lot)
    <tr>
        
        <td>{{ $lot->idlote }}</td>

        <td>{{ $lot->fechaFabricacion }}</td>

        <td>{{ $lot->fechaVencimiento }}</td>
        
        <td>{{ $lot->cantidad }}</td>
        

        <td><a href="{{route('lots.edit',$lot->idlote)}}" class="btn btn-info">Editar</a>
    </tr>

    @endforeach

</table>

@endsection