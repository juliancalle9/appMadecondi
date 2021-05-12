<link href="{{ asset('css/formularioi.css') }}" rel="stylesheet">
@extends('adminlte::page');
@section('title', 'Editar Ciudad')

@section('content')
<<<<<<< HEAD
=======

>>>>>>> 1743379039b0dcf332661be51ab77a3d1b40089e
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>
<link href="css/sweetalert.css" rel="stylesheet">
<<<<<<< HEAD
=======

>>>>>>> 1743379039b0dcf332661be51ab77a3d1b40089e
    <div class="card">
        <div class="card-body">
            <div class="">
                <div class="pull-left">
                    <h2>Editar Ciudad: {{$city->nombre}}</h2>
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                </div>
            </div>
            <br>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cities.index') }}"> Volver</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('cities.update',$city->idciudad) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" name="nombre"  class="form-control" placeholder="Nombre" value="{{$city->nombre}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
<<<<<<< HEAD
                        <button type="submit" class="btn btn-success">Guardar cambios</button>
                    </div>
                </div>
        </div>

        <script>
        document.querySelector('.btn-success').addEventListener('click', success)
        Swal.fire({
  title: 'desea realizar cambios?',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: `Guardar`,
  denyButtonText: `No Guardar`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('Guardar!', '', 'succes')
  } else if (result.isDenied) {
    Swal.fire('No se guadan los cambios', '', 'info')
  }
})
        
        </script>
      
            @endsection
=======
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </div>
                </div>
        </div>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
    document.querySelector('.btn-info').addEventListener('click', Guardar)
    function Guardar(){
        Swal.fire(
        'Buen trabajo!',
        'Ciudad modificada con exito',
        'info'
        )
    }
    </script>
@endsection
>>>>>>> 1743379039b0dcf332661be51ab77a3d1b40089e
