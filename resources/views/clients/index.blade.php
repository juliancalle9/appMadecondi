<link href="{{ asset('css/formularioi.css') }}" rel="stylesheet">
@extends('adminlte::page')

@section('content')
@section('title', 'Clientes')

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

<table  id="tbl_clients" class="table table-bordered">
    

    <tr>

        <th>Documento</th>

        <th>Nombre</th>

        <th>Apellidos</th>

        <th>Teléfono</th>

        <th>Correo Electrónico</th>

        <th>Direccion</th>

        <th>Estado</th>

        <th>Acciones</th>

    </tr>

    @foreach ($clients as $client)
    <tr>

        <td>{{ $client->documento }}</td>

        <td>{{ $client->nombre }}</td>

        <td>{{ $client->apellidos }}</td>

        <td>{{ $client->telefono }}</td>

        <td>{{ $client->correoElectronico }}</td>

        <td>{{ $client->direccion }}</td>

        <td>@if($client->estado > 0)
                <P>HABILITADO</P>
                @else
                <p>DESHABILITADO</p>
            @endif
            </td>

        <td><a href="{{route('clients.edit',$client->documento)}}" class="btn btn-info">Editar</a>
    </tr>

    @endforeach

</table>
</div>

@endsection

@section("Scripts")
<script>
        $('tbl_clients').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'clients/list',
        columns: [
            {data: 'documento', name: 'documento'},
            {data: 'nombre', name: 'nombre'},
            {data: 'apellidos', name: 'apellidos'},
            {data: 'telefono', name: 'telefono'},
            {data: 'correoElectronico', name: 'correoElectronico'},
            {data: 'direccion', name: 'direccion'},
            {data: 'editar', name: 'editar', orderable: false, searchable: false}
            {data: 'cambiar', name: 'cambiar', orderable: false, searchable: false}
        ]
    });
</script>
@endsection