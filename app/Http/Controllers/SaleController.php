<?php

namespace App\Http\Controllers;
use App\Http\Requests\saleFormRequest;
use App\Sale;
use App\SaleDetail;
use App\Product;
use DB;
use Flash;
use Illuminate\Http\Request;
use Response;  

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /**$sale = Sale::all();
        return view('sales.index',compact('sale'));**/
        if($request)
        {
            $sales=DB::table('sales as v')
            ->join('clients as c', 'v.documento', '=', 'c.documento')
            ->join('salesDetail as sc', 'v.idVenta', '=', 'sc.idVenta')
            ->select('sc.idVenta', 'v.documento', 'c.nombre', 'c.apellidos',
            'v.fechaVenta', 'sc.valorTotal');
            $sales = $sales->get();
            return view('sales.index', compact('sales'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients=DB::table('clients as c')
        ->where('c.estado', '=', '1')
        ->get();
        $products=DB::table('products AS pro')
        ->select(DB::raw('CONCAT(pro.idproducto," ",pro.nombre) AS Producto'),
        'pro.idproducto','pro.stock','pro.preciounitario')
        ->where('pro.estado', '=', '1')
        ->where('pro.stock', '>', '0')
        ->get();    
        return view('sales.create', ["clients"=>$clients, "products"=>$products]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(saleFormRequest $request)
    {
        
            DB::beginTransaction(); 
            $sale = new Sale(); 
            //campos de ventas
            $sale->documento= $request->get('documento');
            $sale->fechaVenta= $request->get('fechaVenta');
            $sale->save(); 
            
            //productos
            $idproducto= $request->get('idproducto');
            $nombre = $request->get('nombre');
            $stock = $request->get('stock');
            $cantidad = $request->get('cantidad'); 
            $precioUnitario = $request->get('precioUnitario');
            $valorTotal = $request->get('valorTotal'); 

            //detalles de venta
            $cont = 0;
            while($cont < count($idproducto)){
                $detalle  = new SaleDetail();
                $detalle->idVenta= $sale->idVenta;
                $detalle->idProducto=$idproducto[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->valorTotal=$valorTotal;
                $detalle->save();
                $cont=$cont+1; 
            }
            DB::commit(); 

        
        /*return redirect::to('sales.index');
        $input = $request->all();*/
        Sale::create($request->all());
        return redirect()->route('sales.index')->with('status', 'Venta agregada con éxito.');
          
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show($idVenta)
    {
        $sales=DB::table('sales as v')
            ->join('clients as c', 'v.documento', '=', 'c.documento')
            ->join('salesdetail as sv', 'v.idVenta', '=', 'sv.idVenta')
            ->select('v.idVenta', 'c.documento', 'c.nombre', 'c.apellidos', 'v.fechaVenta', 'sv.valorTotal')
            ->where('v.idVenta', '=', $idVenta)
            ->get(); 

            //tabla detalles
            $detalles = DB::table('salesDetail as dv')
            ->join('products as p', 'dv.idproducto', '=', 'p.idproducto')
            ->select('p.nombre as producto', 'dv.cantidad', 'p.preciounitario')
            ->where('dv.idVenta', '=', $idVenta)
            ->get();
            return view('sales.show', ["sales"=>$sales, "salesDetail"=>$detalles]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    /**public function edit($idVenta)
    {
        return view('sales.edit',['sale' => Sale::find($idVenta)]);
    }**/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(saleFormRequest $request, $idVenta)
    {
        $sale = Sale::find($idVenta);
        $sale->nombreCliente = $request->get('nombreCliente');
        $sale->telefono = $request->get('telefono');
        $sale->direccion = $request->get('direccion');
        $sale-> precioUnitario= $request->get('precioUnitario');
        $sale-> precioTotal= $request->get('precioTotal');
        $sale->update($request->all()); //Editar un registro.
        Flash::success("la venta fue modificada con exito");
        return redirect()->route('sales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
