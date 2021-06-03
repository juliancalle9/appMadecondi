@extends('layouts.admin')

@section('contenido')

<div class="row">
 <div class="col-xs-6">
  <h3>Nuevo Venta</h3>
  @if(count($errors)>0)
  <div class="alert alert-danger">
   <ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
   </ul>
  </div>
  @endif
 </div>
</div>
  {!!Form::open(['url'=>'ventas/venta', 'method'=>'POST','autocomplete'=>'off']) !!}
  {{Form::token()}} 
<div class="row">
 <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

  <div class="form-group">
   <label for="proveedor">Cliente</label>
   <select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true">
    @foreach($personas as $persona)

     <option value="{{$persona->idpersona}} ">{{$persona->nombre}} </option>
    @endforeach
   </select>
  </div>
 </div>

 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
  <div class="form-group">
   <label for="tipo_comprobante">Tipo de Comprobante</label>
   <select name="tipo_comprobante" class="form-control" id="">
    <option value="Boleta">Boleta</option>
    <option value="Factura">Factura</option>
    <option value="Ticket">Ticket</option>
   </select>
  </div>
 </div>

 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
  <div class="form-group">
   <label for="serie_comprobante">Serie de Comprobante</label>
   <input type="text" name="serie_comprobante"  value="{{old('serie_comprobante')}}" class="form-control" placeholder="Serie de Comprobante....">
  </div>
 </div>

 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
  <div class="form-group">
   <label for="num_comprobante">Numero de Comprobante</label>
   <input type="text" name="num_comprobante" required value="{{old('num_comprobante')}}" class="form-control"  placeholder="Numero de Comprobante....">
  </div>
 </div>



 
</div>

<div class="row">

  <div class="panel panel-primary">
   <div class="panel-body">
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
     <div class="form-group">
        <label for="">Artículo</label>
            <select class="form-control selectpicker" name="pidarticulo" id="pidarticulo" data-live-search="true">
            @foreach($articulos as $articulo)
                <option value="{{$articulo->idarticulo}}_{{$articulo->stock}}_{{$articulo->precio_promedio}}">{{$articulo->articulo}} </option>
            @endforeach
            </select>
     </div>
    </div>

    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">

     <div class="form-group">
      <label for="cantidad">Cantidad</label>
      <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="cantidad">

     </div>
     
    </div>

    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">

     <div class="form-group">
      <label for="stock">Stock</label>
      <input type="number" disabled name="pstock" id="pstock" class="form-control" placeholder="Stock">

     </div>
     
    </div>

    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">

     <div class="form-group">
      <label for="precio_venta">Precio de Venta</label>
      <input type="number" disabled name="pprecio_venta" id="pprecio_venta" class="form-control" placeholder="Precio de venta">
     </div>
    </div>

    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">

     <div class="form-group">
      <label for="descuento">Descuento</label>
      <input type="number" name="pdescuento" id="pdescuento" class="form-control" placeholder="Descuento">
     </div>
     
    </div>
    
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">

     <div class="form-group">
      <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
     </div>
    </div>

    <div class="col-lg-12">
     <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">

      <thead style="background-color:#A9D0F5">
       <th>Opciones</th>
       <th>Artículo</th>
       <th>Cantidad</th>
       <th>Precio Venta</th>
       <th>Descuento</th>
       <th>Sub Total</th>
      </thead>
      <tfoot>
       <th>TOTAL</th>
       <th></th>
       <th></th>
       <th></th>
       <th></th>
       <th>
        <h4 id="total">S/. 0.00</h4> <input type="hidden" name="total_venta" id="total_venta">
       </th>
      </tfoot>
      <tbody>
       
      </tbody>
      
     </table>
    </div>

   </div>
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
  
{!!Form::close()!!}

@push ('scripts')
<script>

 $(document).ready(function(){
  $("#bt_add").click(function()

  {
   agregar();
  });
 });
 var cont=0;
 total=0;
 subtotal=[];
  $("#guardar").hide();
  $("#pidarticulo").change(mostrarValores);

  function mostrarValores()
  {
   datosArticulos=document.getElementById('pidarticulo').value.split('_');
   $("#pprecio_venta").val(datosArticulos[2]);
   $("#pstock").val(datosArticulos[1]);
  }
 function agregar() 
 {
  idarticulo=$("#pidarticulo").val();
  articulo =$("#pidarticulo option:selected").text();
  cantidad =$("#pcantidad").val();
  precio_compra = $("#pprecio_compra").val();
  precio_venta = $("#pprecio_venta").val();

  if (idarticulo!="" && cantidad!="" && cantidad>0 && precio_compra!="" && precio_venta!="") 
  {
   subtotal[cont] = (cantidad*precio_compra);
   total = total + subtotal[cont];

   var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+'); ">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_compra[]" value="'+precio_compra+'"></td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td><td>'+subtotal[cont]+'</td></tr>';

   cont++;
   limpiar();
   $("#total").html("$/. "+ total);
   evaluar();
   $("#detalles").append(fila);
  }
  else
  {
   alert("Error al ingresar el detalle de ingreso, por favor revise los datos de Artículo");
  }
 }

 function limpiar() 
 {
  $("#pcantidad").val("");
  $("#pprecio_compra").val("");
  $("#pprecio_venta").val("");
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
  $("#fila" + index).remove();
  evaluar();
 }
</script>
@endpush
@endsection

namespace prueba\Http\Controllers;

use Illuminate\Http\Request;

use prueba\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use prueba\Http\Requests\VentaFormRequest;

//Agregando modelos
use prueba\Venta; 
use prueba\DetalleVenta;

use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class VentaController extends Controller
{
    
 public function __construc(){


    }

public function index(Request $request)
    {
         if ($request)
        {
            $query=trim($request->get('searchText'));
            
            $ventas=DB::table('venta  as v')
            ->join('persona as p','v.idcliente','=','p.idpersona')
            ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
            ->select('v.idventa','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta')
            ->where('v.num_comprobante','LIKE','%'.$query.'%')

           ->orderBy('v.idventa','desc')
           ->groupBy('v.idventa','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado')
            ->paginate(7);
            return view('ventas.venta.index',["ventas"=>$ventas,"searchText"=>$query]);
        }
    }

  
   public function create()
    {
$personas=DB::table('persona')->where('tipo_persona','=','Cliente')->get();
$articulos=DB::table('articulo as art')
->join('detalle_ingreso as di','art.idarticulo','=','di.idarticulo')
->select(DB::raw('CONCAT(art.codigo, " ",art.nombre) AS articulo'),'art.idarticulo','art.stock',DB::raw('avg(di.precio_venta) as precio_promedio'))

->where('art.estado','=','Activo')
->where('art.stock','>','0')
->groupBy('articulo','art.idarticulo','art.stock')
->get();
   return view("ventas.venta.create",["personas"=>$personas,"articulos"=>$articulos]);
   }

    public function store(VentaFormRequest $request)
        {
         try{
        DB::beginTransaction();
        $venta=new Venta;
        $venta->idcliente=$request->get('idcliente');
        $venta->tipo_comprobante=$request->get('tipo_comprobante');
        $venta->serie_comprobante=$request->get('serie_comprobante');
        $venta->num_comprobante=$request->get('num_comprobante');
        $venta->total_venta=$request->get('total_venta');
        
        $mytime=Carbon::now('America/Guayaquil');
        $venta->fecha_hora=$mytime->toDateTimeString();
        $venta->impuesto='18';
        $venta->estado='A';
        $venta->save();

        $idarticulo =$request->get('idarticulo');
        $cantidad =$request->get('cantidad');
        $descuento =$request->get('descuento');
        $precio_venta =$request->get('precio_venta');

        $cont =0;

        while ($cont < count($idarticulo)) {

            $detalle = new DetalleVenta();

            $detalle->idventa= $venta->idventa;
            $detalle->idarticulo= $idarticulo[$cont];
            $detalle->cantidad= $cantidad[$cont];
            $detalle->descuento= $descuento[$cont];
            $detalle->precio_venta= $precio_venta[$cont];
            $detalle->save();
            $cont=$cont+1;
              
             }


        DB::commit();

        }catch(Exception $e){

        DB::roolback();

        }

    return Redirect::to('ventas/venta');

     }



     public function show($id)
    {

        $venta= DB::table('venta as v')
            ->join('persona as p','v.idcliente','=','p.idpersona')
            ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
            ->select('v.idventa','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta')
            ->where('v.idventa','=',$id)
            ->first();
                    
        $detalles=DB::table('detalle_venta as d')
            ->join('articulo as a','d.idarticulo','=','a.idarticulo')
            ->select('a.nombre as articulo','d.cantidad','d.descuento','d.precio_venta')
            ->where('d.idventa','=',$id)
            ->get();

        return view("ventas.venta.show", ["venta"=>$venta,"detalles"=>$detalles]);

}