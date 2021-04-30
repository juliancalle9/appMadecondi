<link href="{{ asset('css/formularioi.css') }}" rel="stylesheet">
@extends('adminlte::page')

@section('title', 'Clientes')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">


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

    <table class="table table-bordered" id="clients">
        

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
</div>

@endsection

<!-- @section("Scripts")
<script>
        $('clients').DataTable({
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
@endsection -->

@section('js')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script>
        $('#clients').DataTable({
            responsive: true,
            AutoWidth: false,

            "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "Nada encontrado- disculpa",
            "info": "Mostrado la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "Search": 'Buscar:',
            "paginate": {
                'next': 'Siguiente',
                "previous": 'Anterior'
            }
        }
        });
    </script>
@endsection