@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <!--cambio de estado -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

</style>
   
@endsection
@include('flash-message')
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

                        <!--<td>
                            <input  type="checkbox" data-id="{{ $client->documento }}" name="estado" class="toggle-class" data-onstyle="success"
                            data-offstyle="danger" data-toggle="toggle" data-on="Habilitado" data-off="Inhabilitado"
                            {{$client->estado ? 'checked' :''}}>
                        </td>-->
                        <td>
                            <input type="checkbox" data-id="{{ $client->documento }}"
                             name="status" class="js-switch" {{ $client->estado == 1 ? 'checked' : '' }}>
                        </td>
                        
                        <td>
                            <a href="{{route('clients.edit',$client->documento)}}" class="btn btn-info">Editar</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
    <script>
            let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

            elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'medium' });
        });
        $(document).ready(function(){
            $('.js-switch').change(function () {
                let estado = $(this).prop('checked') === true ? 1 : 0;
                let documento = $(this).data('documento');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('clients.update.status') }}',
                    data: {'estado': estado, 'documento': documento},
                    success: function (data) {
                        console.log(data.message);
                    }
                });
            });
        });
    </script>
    
@endsection
<!--@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
    <script>

  $(function() {

    $('.toggle-class').change(function() {

        var estado = $(this).prop('checked') == true ? 1 : 0; 

        var documento = $(this).data('documento'); 

         

        $.ajax({

            type: "GET",

            dataType: "json",

            url: '/changeStatus',

            data: {'estado': estado, 'documento': documento},

            success: function(data){

              console.log(data.success)

            }

        });

    })

  })

</script>
@endsection-->

<!-- $(function() {

            $('.toggle-class').change(function() {

                var estado = $(this).prop('checked') == true ? 1 : 0; 

                var documento = $(this).data('documento'); 

                $.ajax({

                    type: "GET",

                    dataType: "json",

                    url: '/cambiarEstado',

                    data: {'estado': estado, 'documento': documento},

                    success: function(data){

                    console.log(data.success)

                    }

                });

            })

            })-->
