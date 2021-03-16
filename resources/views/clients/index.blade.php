@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">

            <div class="pull-left">
                <h2>Clientes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('clients.create')}}">Agregar cliente</a>
            </div>
    </div>
</div>

<table class="table table-bordered">
    

    <tr>

        <th>Documento</th>

        <th>Nombre</th>

        <th>Apellidos</th>

        <th>Teléfono</th>

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

        <td><a href="{{route('clients.edit',$client->documento)}}" class="btn btn-info">Editar</a>
                    <form method="post" action="{{url('/clients/'.$client->documento)}}">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminar la información de este cliente?')">Borrar</button>
                    </form></td>

    </tr>

    @endforeach

</table>

@endsection