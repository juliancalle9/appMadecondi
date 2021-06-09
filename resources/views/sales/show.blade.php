@extends('adminlte::page')
@section('title', 'Detalle Venta')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<div class="card">
    <div class="col-lg-12 margin-tb card-header">
        <div class="pull-left">
            <h2>Detalle de Venta</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('sales.index')}}">Volver</a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body"> 
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="cliente">Cliente:</label>
                    <h5>{{$sales->documento}}-{{$sales->nombre}} {{$sales->apellidos}}</h5>
                </div>
        </div>                   
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                            <thead style="background-color:#A9D0F5">
                                <th>Productos</th>
                                <th>Cantidad</th>
                                <th>Precio Venta</th>
                                <th>Subtotal</th>
                            </thead>
                            <tfoot>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th><h4 id="total">{{$sales->valorTotal}}</h4></th>
                            </tfoot>
                            <tbody>
                                @foreach($detalles as $det)
                                <tr>
                                    <td>{{$det->producto}}</td>
                                    <td>{{$det->cantidad}}</td>
                                    <td>{{$det->precioventa}}</td>
                                    <td>{{$det->cantidad*$det->precioventa}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
    </div>
</div>    
@endsection