@extends('adminlte::page')
@section('title', 'Editar Producto')
@section('content')

<div class="card">

<div class="col-lg-12 margin-tb card-body">

    <div class="pull-left">

        <h2>Editar Producto</h2>

    </div>

    <div class="pull-right">

        <a class="btn btn-primary" href="{{ route('products.index') }}"> Volver</a>

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

        <form action="{{ route('products.update',$product->idproducto) }}" method="POST">

        @csrf

        @method('PUT')

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Nombre:</strong>

                    <input type="text" name="nombre" value="{{ $product->nombre }}" class="form-control" placeholder="Nombre">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

    </div>
  
                    <strong>Precio Unitario:</strong>

                    <input class="form-control"  name="preciounitario" value="{{$product->preciounitario}}" placeholder="Precio Unitario">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Id Categoria:</strong>

                    <input class="form-control"  type="tel" name="idcategoria" value="{{$product->idcategoria}}" placeholder="Id Categoria">

                </div>

            </div>


        </div>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Id lote:</strong>

            <input class="form-control"  type="tel" name="idlote" value="{{$product->idlote}}" placeholder="Id Lote">

        </div>

    </div>

            <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>

        </form>
    </div>
</div>
@endsection