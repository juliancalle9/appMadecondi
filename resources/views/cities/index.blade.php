
@extends('adminlte::page');

@section('content')
 
<div class="row">
    <div class="col-lg-12 margin-tb">

            <div class="pull-left">
                <h2>ciudades</h2>
            </div>
           
      <div class="pull-right">
                <a class="btn btn-success" href="{{route('cities.create')}}">Agregar ciudad</a>
                <a class="btn btn-success" href="{{route('suppliers.index')}}">Proveedores</a>
                
            </div>
    </div>
</div>

<table class="table table-bordered" id="lista">
    

    <tr>

        <th>Id</th>

        <th>Nombre</th>

        <th>Acciones</th>

    </tr>

    @foreach ($cities as $city)
    <tr>

        <td>{{ $city->idciudad }}</td>

        <td>{{ $city->nombre }}</td>

        <td><a href="{{route('cities.edit',$city->idciudad)}}" class="btn btn-info">Editar</a>
    </tr>

    @endforeach

</table>


 

      
@endsection