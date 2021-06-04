@extends('adminlte::page')
@section('title', 'Agregar Compra')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>
<link href="css/sweetalert.css" rel="stylesheet">

    <div class="card">
        <div class="col-lg-12 margin-tb card-header">
            <div class="pull-left">
                <h2>Agregar una nueva compra</h2>
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
            <div class="pull-right">
                 <a class="btn btn-primary" href="{{route('purchases.index')}}">Volver</a>
            </div>
        </div>
        
    </div>
<div class="card">
    <div class="card-body">
            <form action="{{ route('purchases.store') }}" method="POST">
                @csrf

             
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="supplier">Proveedor:</label><br>
                        <input list="proveedores" name="nit" id="nit" class="form-control">
                        <datalist name="nit" id="proveedores" class="">
                            @foreach($suppliers as $supplier)
                            <option value="{{$supplier->nit}}" id="nit"> {{$supplier->nombre}} </option>
                            @endforeach
                        </datalist>
                        <input type="hidden" id="nit">

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fecha Compra:</strong>
                        <input type="date" class="form-control" id="fechacompra" name="fechacompra" placeholder="Fecha Compra">
                    </div>
                </div>
                     
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="">Producto:</label>
                                    <select name="idproducto" id="idproducto" class="form-control selectpicker" >
                                        <option>--Seleccionar--</option>
                                        @foreach($products as $product)
                                            <option value="{{$product->idproducto}}_{{$product->stock}}_{{$product->preciounitario}}">{{$product->producto}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Stock:</strong>
                                    <input value="" type="number" class="form-control" name="stock" id="stock" placeholder="Stock" readonly>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Precio de Compra:</strong>
                                    <input value="" type="number" class="form-control" name="preciounitario" id="preciounitario" placeholder="Precio de compra">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Cantidad:</strong>
                                    <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad">
                                </div>
                            </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="button" id="bt_add" class="btn btn-success">Agregar</button>
                </div>

                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="details" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                            <th>Opciones</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Compra</th>
                            <th>Subtotal</th>
                        </thead>
                        <tfoot>
                            <th>TOTAL</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><h4 id="total">s/ . 0.00</h4>
                                <input type="hidden" name="precioFinal" id="precioFinal>
                            </th>
                        </tfoot>
                    </table>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
            <div class="form-group">
                <input name="_token" value="{{csrf_token()}}" type="hidden"></input>
                <button class="btn bg-primary" type="submit">
                Guardar
                </button>
            
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            </div>
            </div>
          
        </form>
    </div>
</div>

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
$(document).ready(function(){
  $("#bt_add").click(function()

  {
   agregar();
  });
 });
 var cont=0;
 let total=0;
 subtotal=[];
  $("#guardar").hide();
  $("#idproducto").change(mostrarValores);

  function mostrarValores()
  {
   datosProductos=document.getElementById('idproducto').value.split('_');
   $("#preciounitario").val(datosProductos[2]);
   $("#stock").val(datosProductos[1]);
    
  }
 function agregar() 
 {
  datosProductos=document.getElementById('idproducto').value.split('_');
  idproducto=datosProductos[0];
  producto =$("#idproducto option:selected").text();
  cantidad =parseInt($("#cantidad").val(),10);
  preciounitario = parseFloat($("#preciounitario").val());
  stock=parseInt($('#stock').val(),10); 

  if (idproducto!="" && cantidad!="" && cantidad>0 && preciounitario!="") 
  {
        subtotal[cont] = (cantidad*preciounitario);
        total = total + subtotal[cont];

        var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('
        +cont+'); ">X</button></td><td><input type="hidden" name="idproducto[]" value="'+idproducto+'">'+producto+'</td><td><input type="number" name="cantidad[]" value="'
        +cantidad+'"></td><td><input type="number" name="preciounitario[]" value="'+preciounitario+'"></td><td>'
        +subtotal[cont]+'</td></tr>';
        cont++;
        limpiar();
        $("#total").html("$/. "+ total);
        $("#precioFinal").val(total);
        console.log(total); 
        evaluar();
        $("#details").append(fila);
     
   
  }
  else
  {
   alert("Error al ingresar el detalle de la compra, por favor revisar datos de productos");
  }
 }
 function limpiar() 
 {
  $("#cantidad").val("");
  
 }
 function evaluar()
 {
  if (total>0) 
  {
   $("#guardar").show();

  }
  else
  {
   $("#guardar").hide();
  }
 }
 function eliminar(index)
 {
  total= total - subtotal[index];
  $("#total").html("S/. " +total);
  $("#precioFinal").val(total);
  $("#fila" + index).remove();
  evaluar();
 }
</script>

@endsection
