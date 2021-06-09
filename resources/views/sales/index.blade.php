@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection
@section('title', 'Ventas')
@section('content')
<div class="card">
    <div>
        @if(session('status'))
            <div class="alert alert-success">
            {{session('status')}}
            </div>
        @endif
    </div>
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
                    <th>Id</th>
                    <th>Documento Cliente</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha Venta</th>
                    <th>Precio Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->idVenta }}</td>
                    <td>{{ $sale->documento }}</td>
                    <td>{{ $sale->nombre }}</td>
                    <td>{{ $sale->apellidos }}</td>
                    <td>{{ $sale->fechaVenta }}</td>
                    <td>{{ $sale->valorTotal }}</td>
                    <td>
                    <a href="{{route('sales.show',$sale->idVenta)}}" class="btn btn-info">Detalles</a>
                    <a href="{{route('sales.informe') }}" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-print"></i></a>
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