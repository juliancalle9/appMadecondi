<link href="{{ asset('css/formularioi.css') }}" rel="stylesheet">
@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">

@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" />
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

@endsection
@section('title', 'Clientes')

@section('content')
    <div class="card">
        <div class="col-lg-12 margin-tb card-header">
                <div class="pull-left">
                    <h2>Clientes</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('clients.create')}}">Agregar Cliente</a>
                </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped" id="clientes">
                
                <thead>
                    <tr>
                        <th>Documento</th>

                        <th>Nombre</th>

                        <th>Apellidos</th>

                        <th>Teléfono</th>

                        <th>Correo Electrónico</th>

                        <th>Dirección</th>

                        <th>Estado</th>

                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($clients as $client)
                    <tr>

                        <td>{{ $client->documento }}</td>

                        <td>{{ $client->nombre }}</td>

                        <td>{{ $client->apellidos }}</td>

                        <td>{{ $client->telefono }}</td>

                        <td>{{ $client->correoElectronico }}</td>

                        <td>{{ $client->direccion }}</td>

                        <td><input type="checkbox" data-id="{{ $client->documento }}" name="estado" class="toggle-class" data-onstyle="success"
                            data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive"
                        {{ $client->estado ? 'checked' : '' }}>
                            
                            
                            </td>

                        <td><a href="{{route('clients.edit',$client->documento)}}" class="btn btn-info">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script>
        $('#clientes').DataTable({
            reponsive: true,
            autowidth: false,
            "language": {
            "lengthMenu": "Mostrar "+ 
                        '<select class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option><option value="-1">All</option></select>' 
                        
                        +" Registros por página",
            "zeroRecords": "No se hallaron registros",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "Sin registros",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            'search': 'Buscar:',
            'paginate':{
                'next': 'Siguiente',
                'previous': 'Anterior'
            }
        }
        });
    </script>
@endsection


