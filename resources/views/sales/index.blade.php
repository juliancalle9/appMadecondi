@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection
@section('title', 'Ventas')
@section('content')
<div class="card">
    <div class="col-lg-12 margin-tb card-header">

            <div class="pull-left">
                <h2>Ventas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('sales.create')}}">Agregar Venta</a>
            </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-bordered" id="ventas">
            <thead>
                <tr>
                    <th>Id Venta</th>
                    <th>Nombre Cliente</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Precio Unitario</th>
                    <th>Precio Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->idVenta }}</td>
                    <td>{{ $sale->nombreCliente }}</td>
                    <td>{{ $sale->telefono }}</td>
                    <td>{{ $sale->direccion }}</td>
                    <td>{{ $sale->precioUnitario }}</td>
                    <td>{{ $sale->precioTotal }}</td>

                    <td><a href="{{route('sales.edit',$sale->idVenta)}}" class="btn btn-info">Editar</a>
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
        $('#ventas').DataTable({
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