@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <!-- cambio de estado -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"> 
@endsection
@section('content')
@section('title', 'Productos')
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

                        <th>Categoría</th>

                        <th>Nombre</th>

                        <th>Descripcion</th>

                        <th>Precio Unitario</th>

                        <th>Stock</th>

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

                        <td>{{ $product->stock }}</td>

                        <td><input  type="checkbox" data-id="{{ $product->idproducto }}" name="estado" class="toggle-class" data-onstyle="success"
                            data-offstyle="danger" data-toggle="toggle" data-on="Activo" data-off="inactivo"
                            {{$product->estado ? 'checked' :''}}>
                            </td>

                        <td><a href="{{route('products.edit',$product->idproducto)}}" class="btn btn-info">Editar</a></td>
                    </tr>
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

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
  $(function() {
    $('#toggle-two').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled'
    });
  })
</script>

<script>
    $('.toggle-class').on('change', function(){
        var estado = $(this).prop('checked') == true ? 1 : 0;
        var idproducto = $(this).data('id');
        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: '{{ route('changeStatus') }}',
            data: {
                'estado': estado,
                'idproducto': idproducto
            }
            
        });
    });
</script>
@endsection