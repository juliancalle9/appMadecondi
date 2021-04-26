@extends('adminlte::page');

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">

            <div class="pull-left">
                <h2>Proveedores</h2>
            </div>
          
    
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('suppliers.create')}}">Agregar Proveedor</a>
                <a class="btn btn-primary" href="{{route('cities.index')}}"> Ciudades</a>
                
            </div>
    </div>
</div>


<table class="table table-bordered">
    

    <tr>

        <th>NIT</th>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Ciudad</th>
        <th>Acciones</th>

</tr>

@foreach ($suppliers as $supplier)
<tr>

<td>{{ $supplier->nit }}</td>

<td>{{ $supplier->nombre }}</td>

<td>{{ $supplier->direccion }}</td>

<td>{{ $supplier->telefono }}</td>

<td>{{ $supplier->idciudad }}</td>


<td><a href="{{route('suppliers.edit',$supplier->nit)}}" class="btn btn-info">Editar</a>
</tr>

@endforeach

</table>


@endsection