@extends('layouts.app')

@section('content')
<div class="row">

<div class="col-lg-12 margin-tb">

    <div class="pull-left">
        <h2>Clientes</h2>
    </div>
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('clients.create') }}">Agregar client</a>
    </div>

    <table class="table table-bordered">

<tr>

    <th>Documento</th>

    <th>Nombre</th>

    <th>Apellidos</th>

    <th>Telfono</th>

    <th>Correo Electrónico</th>

    <th width="280px">Acciones</th>

</tr>

@foreach ($clients as $client)

<tr>

    <td>{{ $client->documento }}</td>

    <td>{{ $client->nombre }}</td>

    <td>{{ $client->apellidos }}</td>

    <td>{{ $client->telefono }}</td>

    <td>{{ $client->correoElectronico }}</td>

    <td>

        <form action="{{ route('products.destroy',$product->id) }}" method="POST">



            <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Mostrar</a>



            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Editar</a>



            @csrf

            @method('DELETE')



            <button type="submit" class="btn btn-danger">Delete</button>

        </form>

    </td>

</tr>

@endforeach

</table>

@endsection