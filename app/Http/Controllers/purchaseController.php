<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Requests\purchaseFormRequest;
use Illuminate\Http\Request;
use App\Purchase;
use App\Product;
use App\Purchasedetail; 
Use Flash;
use DB;
use Response;


class purchaseController extends Controller
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
        if($request)
        {
        
            $purchases=DB::table('purchases as c')
            ->join('suppliers as p', 'c.id', '=', 'p.id')
            ->join('purchasesdetails as pd', 'c.idcompra', '=', 'pd.idcompra')
            ->select('c.idcompra', 'p.nit', 'p.nombre', 
            'c.fechacompra', 'pd.precioFinal')
            ->DISTINCT();
            $purchases = $purchases->get();
            return view('purchases.index', compact('purchases'));
   }
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $suppliers=DB::table('suppliers as s')
        ->where('s.estado', '=', '1' )
        ->get();
        $products=DB::table('products as pro')
        ->select(DB::raw('CONCAT(pro.idproducto, " ", pro.nombre) as producto'),
        'pro.idproducto','pro.stock','pro.preciocompra')
        ->where('pro.estado', '=', '1')
        ->get();    
        return view('purchases.create', ["suppliers"=>$suppliers, "products"=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(purchaseFormRequest $request)
    {
        
            DB::beginTransaction(); 
            $purchase = new Purchase(); 
            //campos de compras
            $purchase->id= $request->get('id');
            $purchase->fechacompra= $request->get('fechacompra');
            $purchase->save(); 
            
            //productos
            $idproducto= $request->get('idproducto');
            $nombre = $request->get('nombre');
            $stock = $request->get('stock');
            $cantidad = $request->get('cantidad'); 
            $preciocompra = $request->get('preciocompra');
            $precioFinal = $request->get('precioFinal'); 

            //detalles de compra
            $cont = 0;
            while($cont < count($idproducto)){
                $detalle  = new Purchasedetail();
                $detalle->idcompra= $purchase->idcompra;
                $detalle->idproducto=$idproducto[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->precioFinal=$precioFinal;
                $detalle->save(); 
                $cont=$cont+1; 
            }
            DB::commit(); 

            

        Purchase::create($request->all());
        return redirect()->route('purchases.index')->with('status', 'Compra agregada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show($idcompra)
    {
        $purchases=DB::table('purchases as c')
            ->join('suppliers as p', 'c.id', '=', 'p.id')
            ->join('purchasesdetails as dp', 'c.idcompra', '=', 'dp.idcompra')
            ->select('c.idcompra', 'p.nit', 'p.nombre',  'c.fechacompra', 'dp.precioFinal')
            ->where('c.idcompra', '=', $idcompra)
            ->first(); 

            //tabla detalles
            $detalles = DB::table('purchasesdetails as dp')
            ->join('products as p', 'dp.idproducto', '=', 'p.idproducto')
            ->select('p.nombre as producto', 'dp.cantidad', 'p.preciocompra','dp.precioFinal')
            ->where('dp.idcompra', '=', $idcompra)
            ->get();
            return 
            view('purchases.show', ["purchases"=>$purchases, "purchasesdetails"=>$detalles],
             compact('detalles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit($idcompra)
    {
        return view('purchases.edit',['purchase' => Purchase::find($idcompra)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(purchaseFormRequest $request, $idcompra)
    {
        $purchase = Purchase::find($idcompra);
        
        
        
        $purchase->nombre = $request->get('nombre');
        $purchase->direccion = $request->get('direccion');
        $purchase->telefono = $request->get('telefono');
        $purchase-> precioUnitario= $request->get('preciocompra');
        $sale-> precioTotal= $request->get('precioTotal');

        
        $sale->update($request->all()); //Editar un registro.
        Flash::success("la compra fue modificada con exito");
        return redirect()->route('purchases.index')->with('success', 'Compra actualizada con éxito.');

         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete(); 
        return redirect()->route('purchases.index')
                        ->with('success', 'compra eliminada con éxito');
    }
    public function pdf(Purchase $purchase)
    {
        $purchase=DB::table('purchases as c')
            ->join('suppliers as p', 'c.nit', '=', 'p.nit')
            ->join('purchasesdetails as dp', 'c.idcompra', '=', 'dp.idcompra')
            ->select('c.idcompra', 'p.nit', 'p.nombre',  'c.fechacompra', 'dp.precioFinal')
            ->where('c.idcompra', '=', $idcompra)
            ->first(); 

            //tabla detalles
            $detalles = DB::table('purchasesdetails as dp')
            ->join('products as p', 'dp.idproducto', '=', 'p.producto')
            ->select('p.nombre as producto', 'dp.cantidad')
            ->where('c.idcompra', '=', $idcompra)
            ->get();
            return view('purchases.pdf', ["purchases"=>$purchases, "purchasesdetails"=>$purchasesdetails]);

    }
    
}
