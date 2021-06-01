@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection
@section('content')


<div class="card">
    <div class="col-lg-12 margin-tb card-header">

            <div class="pull-left">
                <h2>Productos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('products.create')}}">Agregar Productos</a>
                <a href="{{route('categories.index')}}" class="btn btn-secondary">Categorías</a>
                
                

            </div>
    </div>
</div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="productos">
                <thead>
                    <tr>

                        <th>Id </th>

                        <th>Categoria</th>

                        <th>Nombre</th>

                        <th>Descripcion</th>

                        <th>Precio Unitario</th>

                        <th>Cantidad</th>

                        <th>Estado</th>

                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->idproducto}}</td>
                        
                        <td>{{ $product->categoria }}</td>

                        <td>{{ $product->nombre }}</td>

                        <td>{{ $product->descripcion }}</td>

                        <td>{{ $product->preciounitario }}</td>

                        <td>{{ $product->cantidad }}</td>

                        <td>@if($product->estado > 0)
                                <P>HABILITADO</P>
                                @else
                                <p>DESHABILITADO</p>
                            @endif
                            </td>

        <td><a href="{{route('products.edit',$product->idproducto)}}" class="btn btn-info">Editar</a>
   
                    @endforeach
                <tbody>
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
        $('#productos').DataTable({
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