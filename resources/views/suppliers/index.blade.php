@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <!-- cambio de estado -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"> 
@endsection
@section('title', 'Proveedores')
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
                    <h2>Proveedores</h2>
                </div>
            
        
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('suppliers.create')}}">Agregar Proveedor</a>
                  
                    
                </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="proveedores">
                <thead>
                    <tr>

                        <th>NIT</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Correo Electrónico</th>
                        <th>Ciudad</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                

                
                    @foreach ($suppliers as $supplier)
                    <tr>

                    <td>{{ $supplier->nit }}</td>

                    <td>{{ $supplier->nombre }}</td>

                    <td>{{ $supplier->direccion }}</td>

                    <td>{{ $supplier->telefono }}</td>

                    <td>{{ $supplier->correoelectronico }}</td>

                    <td>{{ $supplier->ciudad }}</td>

                    <td><input  type="checkbox" data-id="{{ $supplier->id }}" name="estado" class="toggle-class" data-onstyle="success"
                            data-offstyle="danger" data-toggle="toggle" data-on="Activo" data-off="inactivo"
                            {{$supplier->estado ? 'checked' :''}}></td>
                    <td><a href="{{route('suppliers.edit',$supplier->id)}}" class="btn btn-info">Editar</a>
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
        $('#proveedores').DataTable({
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
        var id = $(this).data('id');
        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: '{{ route('changeStatus') }}',
            data: {
                'estado': estado,
                'id': id
            }
            
        });
    });
</script>
@endsection