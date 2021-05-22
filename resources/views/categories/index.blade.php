@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection
@section('title', 'Categorías')
@section('content')
<div class="card">
    <div class="col-lg-12 margin-tb card-header">

            <div class="pull-left">
                <h2>Categoría</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('categories.create')}}">Agregar Categoría</a>
                <a href="{{route('products.index')}}" class="btn btn-secondary">Productos</a>
            </div>
    </div>
</div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="categorias">
                <thead>
                    <tr>
                        <th>Id Categoría</th>

                        <th>Nombre</th>

                        <th>Descripción</th>

                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->idcategoria}}</td>
                    
                        <td>{{ $category->nombre }}</td>

                        <td>{{ $category->descripcion }}</td>

                        <td><a href="{{route('categories.edit',$category->idcategoria)}}" class="btn btn-info">Editar</a>
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
        $('#categorias').DataTable({
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