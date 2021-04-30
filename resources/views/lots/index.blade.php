@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection
@section('content')
@section('title', 'Lotes')

<div class="card">
    <div class="col-lg-12 margin-tb card-header">

            <div class="pull-left">
                <h2>Lotes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('lots.create')}}">Agregar Lotes</a>
                <a href="{{route('products.index')}}" class="btn btn-secondary">Productos</a>
                <a href="{{route('categories.index')}}" class="btn btn-secondary">Categorías</a>
               
            </div>
    </div>
</div>
<div class="card">
    <div class="card-body">

        <table class="table table-bordered" id="lotes"> 
            <thead>
                <tr>

                    <th>Id Lote</th>

                    <th>Fecha Fabricación</th>

                    <th>Fecha Vencimiento</th>

                    <th>Cantidad</th>

                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($lots as $lot)
                <tr>
                    
                    <td>{{ $lot->idlote }}</td>

                    <td>{{ $lot->fechaFabricacion }}</td>

                    <td>{{ $lot->fechaVencimiento }}</td>
                    
                    <td>{{ $lot->cantidad }}</td>

                    <td><a href="{{route('lots.edit',$lot->idlote)}}" class="btn btn-info">Editar</a>
                </tr>
            </tbody>
                @endforeach

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
        $('#lotes').DataTable({
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