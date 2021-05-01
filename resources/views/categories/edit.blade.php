@extends('adminlte::page')
@section('title', 'Editar Categoría')
@section('content')

<div class="card">

    <div class="col-lg-12 margin-tb card-header">

        <div class="pull-left">

            <h2>Editar Categoría</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('categories.index') }}"> Volver</a>

        </div>

    </div>

</div>



@if ($errors->any())

<div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif


<div class="card">
    <div class="card-body">

        <form action="{{ route('categories.update',$category->idcategoria) }}" method="POST">

        @csrf

        @method('PUT')



        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Nombre:</strong>

                    <input type="text" name="nombre" value="{{ $category->nombre }}" class="form-control" placeholder="Nombre">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Descripción</strong>

                    <input class="form-control"  name="descripcion" value="{{$category->descripcion}}" placeholder="descripción">

                </div>

            </div>

        </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>
        </form>
    </div>
</div>
@endsection