@extends('adminlte::page');
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection
@section('title', 'Ciudades')
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
                <h2>Ciudades</h2>
            </div>
           
      <div class="pull-right">
                <a class="btn btn-success" href="{{route('cities.create')}}">Agregar Ciudad</a>
                <a class="btn btn-secondary" href="{{route('suppliers.index')}}">Proveedores</a>
                
                
            </div>
    </div>
</div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="ciudades">
                <thead>
                    <tr>
                        <th>Id</th>

                        <th>Nombre</th>

                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cities as $city)
                    <tr>
                        <td>{{ $city->idciudad }}</td>

                        <td>{{ $city->nombre }}</td>

                       
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
        $('#ciudades').DataTable({
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